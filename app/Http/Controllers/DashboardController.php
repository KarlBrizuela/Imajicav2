<?php

namespace App\Http\Controllers;
use App\Models\supplier;
use App\Models\patient;
use Carbon\Carbon;
use App\Models\branch;
use App\Models\coupon;
use App\Models\tier;
use App\Models\staff;
use App\Models\booking;
use App\Models\category;
use Illuminate\Http\Request;
use App\Models\service;
use App\Models\order;
use App\Models\waste;

use App\Models\positionModel;

use App\Models\category_expense;

use Illuminate\Support\Facades\DB;
use App\Models\Department;

class DashboardController extends Controller
{
    // Add this method to fix the "Method does not exist" error
    public function dashboard()
    {
        $patients = Patient::all();
        $bookings = Booking::with(['patient', 'services'])->get();
        
        // Get services with booking counts and monthly data
        $services = DB::table('services')
            ->select(
                'services.service_id',
                'services.service_name',
                'services.service_cost',
                DB::raw('COUNT(DISTINCT booking_service.booking_id) as booking_count')
            )
            ->leftJoin('booking_service', 'services.service_id', '=', 'booking_service.service_id')
            ->groupBy('services.service_id', 'services.service_name', 'services.service_cost')
            ->orderBy('booking_count', 'desc')
            ->get()
            ->map(function($service) {
                // Get monthly booking counts for the last 6 months
                $monthlyData = [];
                for ($i = 5; $i >= 0; $i--) {
                    $month = now()->subMonths($i)->format('Y-m');
                    $count = DB::table('booking_service')
                        ->join('bookings', 'booking_service.booking_id', '=', 'bookings.booking_id')
                        ->where('booking_service.service_id', $service->service_id)
                        ->whereYear('bookings.booking_date', now()->subMonths($i)->year)
                        ->whereMonth('bookings.booking_date', now()->subMonths($i)->month)
                        ->count();
                    $monthlyData[] = $count;
                }
                $service->monthly_data = $monthlyData;
                return $service;
            });
        
        // Calculate patient growth
        $patientGrowth = 0;
        if ($patients->count() > 0) {
            $lastMonthPatients = Patient::whereMonth('created_at', now()->subMonth()->month)->count();
            $patientGrowth = $lastMonthPatients > 0 ? (($patients->count() - $lastMonthPatients) / $lastMonthPatients) * 100 : 0;
        }

        // Calculate booking growth
        $bookingGrowth = 0;
        if ($bookings->count() > 0) {
            $lastMonthBookings = Booking::whereMonth('created_at', now()->subMonth()->month)->count();
            $bookingGrowth = $lastMonthBookings > 0 ? (($bookings->count() - $lastMonthBookings) / $lastMonthBookings) * 100 : 0;
        }

        // Get today's birthdays
        $todayBirthdays = Patient::whereMonth('birthdate', now()->month)
            ->whereDay('birthdate', now()->day)
            ->get();

        // Get upcoming birthdays (next 30 days)
        $upcomingBirthdays = Patient::where(function($query) {
            $query->whereMonth('birthdate', now()->month)
                ->whereDay('birthdate', '>', now()->day)
                ->orWhere(function($q) {
                    $nextMonth = now()->addMonth();
                    $q->whereMonth('birthdate', $nextMonth->month)
                        ->whereDay('birthdate', '<=', now()->addDays(30)->day);
                });
        })
        ->get()
        ->map(function($patient) {
            $birthday = Carbon::parse($patient->birthdate);
            $nextBirthday = Carbon::parse($patient->birthdate)->year(now()->year);
            if ($nextBirthday->isPast()) {
                $nextBirthday->addYear();
            }
            $patient->daysUntil = now()->diffInDays($nextBirthday);
            return $patient;
        });

        // Get all birthdays grouped by month
        $allBirthdays = Patient::all()
            ->groupBy(function($patient) {
                return Carbon::parse($patient->birthdate)->format('F');
            });

        // Get branch data with proper relationships
        $branchData = Branch::with(['bookings' => function($query) {
            $query->with(['services' => function($q) {
                $q->select('services.service_id', 'services.service_name', 'services.service_cost');
            }]);
        }])
        ->get()
        ->map(function ($branch) {
            $totalBookings = $branch->bookings->count();
            $totalRevenue = $branch->bookings->sum(function ($booking) {
                return $booking->services->sum('service_cost');
            });
            
            return [
                'name' => $branch->branch_name,
                'bookings' => $totalBookings,
                'revenue' => $totalRevenue
            ];
        });

        // Calculate total expenses from the expenses table
        $totalExpenses = \App\Models\expenses::sum('expense_cost');

        return view('page.dashboard', compact(
            'patients', 
            'bookings', 
            'services',
            'patientGrowth', 
            'bookingGrowth', 
            'todayBirthdays', 
            'upcomingBirthdays', 
            'allBirthdays',
            'branchData',
            'totalExpenses'
        ));
    }
    
    public function index()
    {
        // Get all patients for count
        $patients = patient::all();
        $bookings = booking::all();
        
        // Get services with booking counts
        $services = service::select('service_id', 'service_name', 'service_cost')
            ->withCount('booking')
            ->get();
        
        // Calculate patient growth (example calculation - modify as needed)
        $patientGrowth = $this->calculatePatientGrowth();
        
        // Calculate booking growth
        $bookingGrowth = $this->calculateBookingGrowth();
        
        // Get today's birthdays
        $todayBirthdays = $this->getTodayBirthdays();
        
        // Get upcoming birthdays (next 30 days)
        $upcomingBirthdays = $this->getUpcomingBirthdays();
        
        // Get all birthdays for the modal
        $allBirthdays = $this->getAllBirthdays();
        
        // Updated branch data fetching
        $branchData = branch::with(['bookings' => function($query) {
                $query->with(['services' => function($q) {
                    $q->select('services.service_id', 'services.service_name', 'services.service_cost');
                }]);
            }])
            ->get()
            ->map(function ($branch) {
                $totalBookings = $branch->bookings->count();
                $totalRevenue = $branch->bookings->sum(function ($booking) {
                    return $booking->services->sum('service_cost');
                });
                
                return [
                    'name' => $branch->branch_name,
                    'bookings' => $totalBookings,
                    'revenue' => $totalRevenue
                ];
            });

        // Calculate total expenses from the expenses table
        $totalExpenses = \App\Models\expenses::sum('expense_cost');

        return view('page.dashboard', compact(
            'patients', 
            'bookings', 
            'services',
            'patientGrowth', 
            'bookingGrowth', 
            'todayBirthdays', 
            'upcomingBirthdays', 
            'allBirthdays',
            'branchData',
            'totalExpenses'
        ));
    }
    
    private function calculatePatientGrowth()
    {
        // Get current month's new patients
        $thisMonth = Patient::whereMonth('created_at', Carbon::now()->month)
                          ->whereYear('created_at', Carbon::now()->year)
                          ->count();
        
        // Get last month's new patients
        $lastMonth = Patient::whereMonth('created_at', Carbon::now()->subMonth()->month)
                          ->whereYear('created_at', Carbon::now()->subMonth()->year)
                          ->count();
        
        // Calculate growth percentage
        if ($lastMonth > 0) {
            return (($thisMonth - $lastMonth) / $lastMonth) * 100;
        }
        
        return $thisMonth > 0 ? 100 : 0; // If last month was 0, return 100% growth or 0 if no new patients
    }
    
    private function calculateBookingGrowth()
    {
        // Get the start of the current month and previous month
        $currentMonthStart = Carbon::now()->startOfMonth();
        $lastMonthStart = Carbon::now()->subMonth()->startOfMonth();
        $lastMonthEnd = Carbon::now()->subMonth()->endOfMonth();

        // Count bookings for current month and previous month
        $currentMonthBookings = Booking::where('start_date', '>=', $currentMonthStart)->count();
        $lastMonthBookings = Booking::whereBetween('start_date', [$lastMonthStart, $lastMonthEnd])->count();

        // Calculate growth percentage
        if ($lastMonthBookings > 0) {
            $growth = (($currentMonthBookings - $lastMonthBookings) / $lastMonthBookings) * 100;
        } else {
            $growth = $currentMonthBookings > 0 ? 100 : 0;
        }

        return round($growth, 1);
    }
    
    private function getTodayBirthdays()
    {
        $today = Carbon::today();
        
        return Patient::whereMonth('birthdate', $today->month)
                    ->whereDay('birthdate', $today->day)
                    ->get()
                    ->map(function($patient) {
                        $patient->age = Carbon::parse($patient->birthdate)->age;
                        $patient->birthdayLabel = 'Today';
                        // Generate initials from first and last name
                        $patient->initials = mb_substr($patient->firstname, 0, 1) . mb_substr($patient->lastname, 0, 1);
                        return $patient;
                    });
    }
    
    private function getUpcomingBirthdays($days = 30)
    {
        $today = Carbon::today();
        $endDate = Carbon::today()->addDays($days);
        
        // This query gets birthdays in the upcoming days, excluding today
        return Patient::whereRaw("
            (MONTH(birthdate) > ? OR 
            (MONTH(birthdate) = ? AND DAY(birthdate) > ?)) AND
            (MONTH(birthdate) < ? OR 
            (MONTH(birthdate) = ? AND DAY(birthdate) <= ?))
            ", [
                $today->month,
                $today->month, $today->day,
                $endDate->month,
                $endDate->month, $endDate->day
            ])
            ->orWhereRaw("
                MONTH(birthdate) = ? AND 
                DAY(birthdate) > ? AND
                DAY(birthdate) <= ?
            ", [
                $today->month, $today->day, $endDate->day
            ])
            ->orderByRaw('MONTH(birthdate), DAY(birthdate)')
            ->get()
            ->map(function($patient) use ($today) {
                $patient->age = Carbon::parse($patient->birthdate)->age;
                
                // Calculate how many days until birthday
                $nextBirthday = Carbon::parse($patient->birthdate)->setYear($today->year);
                if ($nextBirthday->isPast()) {
                    $nextBirthday->addYear();
                }
                $daysUntil = $today->diffInDays($nextBirthday, false);
                
                $patient->daysUntil = $daysUntil;
                $patient->birthdayLabel = "In {$daysUntil} days";
                
                // Generate initials from first and last name
                $patient->initials = mb_substr($patient->firstname, 0, 1) . mb_substr($patient->lastname, 0, 1);
                
                return $patient;
            });
    }
    
    private function getAllBirthdays()
    {
        // Group patients by birth month for the birthday modal
        $patients = Patient::all();
        $birthdays = [];
        
        foreach ($patients as $patient) {
            $birthMonth = Carbon::parse($patient->birthdate)->format('F');
            $birthDay = Carbon::parse($patient->birthdate)->format('j');
            $patient->birthDay = $birthDay;
            $patient->age = Carbon::parse($patient->birthdate)->age;
            $patient->initials = mb_substr($patient->firstname, 0, 1) . mb_substr($patient->lastname, 0, 1);
            
            // Calculate days until birthday
            $today = Carbon::today();
            $nextBirthday = Carbon::parse($patient->birthdate)->setYear($today->year);
            if ($nextBirthday->isPast()) {
                $nextBirthday->addYear();
            }
            $patient->daysUntil = $today->diffInDays($nextBirthday, false);
            
            if (!isset($birthdays[$birthMonth])) {
                $birthdays[$birthMonth] = [];
            }
            
            $birthdays[$birthMonth][] = $patient;
        }
        
        // Sort months chronologically starting from current month
        $currentMonth = Carbon::now()->format('F');
        $months = array_keys($birthdays);
        usort($months, function($a, $b) use ($currentMonth) {
            $aMonth = Carbon::parse("1 $a")->month;
            $bMonth = Carbon::parse("1 $b")->month;
            $currentMonthNum = Carbon::parse("1 $currentMonth")->month;
            
            // Adjust month values relative to current month
            $aAdjusted = $aMonth < $currentMonthNum ? $aMonth + 12 : $aMonth;
            $bAdjusted = $bMonth < $currentMonthNum ? $bMonth + 12 : $bMonth;
            
            return $aAdjusted - $bAdjusted;
        });
        
        $sortedBirthdays = [];
        foreach ($months as $month) {
            $sortedBirthdays[$month] = $birthdays[$month];
            
            // Sort patients within each month by day of month
            usort($sortedBirthdays[$month], function($a, $b) {
                return $a->birthDay - $b->birthDay;
            });
        }
        
        return $sortedBirthdays;
    }

    public function new_coupon()
    {
        $branches = Branch::all();
        $services = service::all();
        return view('page.new-coupon', compact('branches', 'services')); 

    }

    public function coupon_list()
    {
        $coupons = coupon::all();
        $branches = Branch::all();
        $services = service::all();
        return view('page.coupon-list', compact('coupons', 'branches', 'services'));
    }

    public function new_loyalty()
    {
        $tiers = tier::all();
        return view('page.new-loyalty', compact('tiers'));
    }

    public function loyalty_list()
    {
        $tiers = tier::all();
        return view('page.loyalty-list', compact('tiers'));
    }
    public function new_patient()
    {
        // Get all patient tiers for the dropdown
        $tiers = tier::all();
        
        // Pass the tiers to the view
        return view('page.new-patient', compact('tiers'));
    }
    public function patient_list()
    {
        $tiers = tier::all();
        $patients = patient::all();
        return view('page.patient-list', compact('patients', 'tiers'));
    }
    public function new_supplier()
    {
        return view('page.new-supplier');
    }
    public function supplier_list()
    {

        $suppliers = supplier::all();   
        return view('page.supplier-list',compact('suppliers'));

    }
    public function expenses_list()
    {
        $expenses = \App\Models\expenses::with(['category_expense', 'branch'])->get();
        return view('page.expenses-list', compact('expenses'));
    }

    public function new_expenses()
    {
        $branches = Branch::all();
        $positions = positionModel::with('department')->get();
        $categories = category_expense::all();
    
        return view('page.new-expenses', compact('branches', 'categories'));
    }
    public function position_list(){
       $positions = positionModel::all();
        $departments = Department::all();
        $branches = Branch::all();
        $positions = positionModel::with('department')->get();
        $categories = category::all();
        return view('page.position-list', compact('positions', 'departments'));
    }


    public function newcategory_expenses()
    {
    
        return view('page.NewCategory-Expenses');
    }

    public function categoryexpenses_list()
    {
        $categories = category_expense::all();
        $branches = Branch::all();
        return view('page.categoryexpenses-list', compact('categories', 'branches'));
    }


    public function new_staff()
    {
        $positions = positionModel::all();
        $departments = Department::all();
        $branches = Branch::all();
        return view('page.new-staff', compact('branches', 'positions', 'departments'));
    }
    

    public function staff_list()
    {
        $staffs = staff::all();
        $branches = Branch::all();
        return view('page.staff-list', compact('branches', 'staffs'));
    } 
    public function new_department()
    {
        $staff = staff::all();
        $departments = department::all();
        return view('page.new-department', compact('staff', 'departments'));
    }
    public function department_list()
    {
        $departments = department::all();
        return view('page.department-list', compact('departments'));
    }
    public function new_branch()
    {
        return view('page.new-branch');
    }  
    public function branch_list()
    {
        $branchs = Branch::all();
        
        return view('page.branch-list', ['branchs'=> $branchs]);
    }

    /**
     * Show the edit branch page.
     *
     * @param string $branch_code
     * @return \Illuminate\Contracts\View\View
     */
    public function edit_branch($branch_code)
    {
        // Fetch branch details by branch_code
        $branch = \App\Models\Branch::where('branch_code', $branch_code)->firstOrFail();
        
        return view('page.edit-branch', compact('branch'));
    }

    public function customer_report()
    {
        return view('page.customer-report');
    }
    public function service_product()
    {
        return view('page.service-product');
    }
    public function employee_report()
    {
        return view('page.employee-report');
    }


    public function sales_transaction()
    {
            $sales = booking::all();
        return view('page.sales-transaction', compact('sales'));
    }
    public function employee_sales()
    {
        $employees = DB::table('staff')
            ->select(
                DB::raw('CONCAT(staff.firstname, " ", staff.lastname) as employee_name'),
                DB::raw('COUNT(DISTINCT bookings.booking_id) as service_count'),
                DB::raw('COUNT(DISTINCT bookings.patient_id) as client_count'),
                DB::raw('COALESCE(SUM(CASE WHEN bookings.status = "Completed" THEN services.service_cost ELSE 0 END), 0) as total_service_sales'),
                DB::raw('COALESCE(SUM(CASE WHEN bookings.status = "Completed" THEN services.service_cost ELSE 0 END), 0) as total_sales')
            )
            ->leftJoin('bookings', 'staff.id', '=', 'bookings.id')
            ->leftJoin('services', 'bookings.service_id', '=', 'services.service_id')
            ->where('bookings.status','=', 'Completed')
            ->groupBy('staff.id', 'staff.firstname', 'staff.lastname')
            ->orderBy('staff.firstname')
            ->get();

        // Calculate total metrics for the header cards
        $totalMetrics = [
            'total_sales' => $employees->sum('total_sales'),
            'monthly_sales' => $this->getMonthlySales(),
            'top_employee' => $employees->sortByDesc(function($emp) {
                // Score based on service count and client count
                return ($emp->service_count * 0.6) + ($emp->client_count * 0.4);
            })->first()
        ];

        return view('page.employee-sales', compact('employees', 'totalMetrics'));
    }

    private function getMonthlySales()
    {
        $currentMonth = now()->month;
        return DB::table('bookings')
            ->whereMonth('start_date', $currentMonth)
            ->leftJoin('services', 'bookings.service_id', '=', 'services.service_id')
            ->where('bookings.status', 'Completed')
            ->sum('services.service_cost');
    }

    public function commision_employee()
    {
        $commissions = DB::table('staff')
            ->select(
                DB::raw('CONCAT(staff.firstname, " ", staff.lastname) as employee_name'),
                DB::raw('COUNT(bookings.booking_id) as service_sales_no'),
                DB::raw('COUNT(DISTINCT bookings.patient_id) as clients_no'),
                DB::raw('COALESCE(SUM(services.service_cost), 0) as total_service_sales'),
                DB::raw('COALESCE(SUM(services.service_cost) * 0.10, 0) as total_service_commission'),
                DB::raw('COALESCE(COUNT(bookings.booking_id) * 500, 0) as total_session_commission'),
                DB::raw('COALESCE((SUM(services.service_cost) * 0.10) + (COUNT(bookings.booking_id) * 500), 0) as total_commission')
            )
            ->leftJoin('bookings', 'staff.id', '=', 'bookings.id')
            ->leftJoin('services', 'bookings.service_id', '=', 'services.service_id')
            ->where('bookings.status', '=', 'Completed')
            ->groupBy('staff.id', 'staff.firstname', 'staff.lastname')
            ->orderBy('employee_name')
            ->get();
    
        // Calculate total metrics for the header cards
        $totalMetrics = [
            'total_sales' => $commissions->sum('total_service_sales'),
            'monthly_commission' => $this->getMonthlyCommission(),
            'total_commission' => $commissions->sum('total_commission'),
            'top_employee' => $commissions->sortByDesc(function($emp) {
                // Score based on service sales and clients
                return ($emp->service_sales_no * 0.6) + ($emp->clients_no * 0.4);
            })->first()
        ];
    
        return view('page.commision-employee', compact('commissions', 'totalMetrics'));
    }
    
 
    
    private function getMonthlyCommission()
    {
        $currentMonth = now()->month;
        return DB::table('bookings')
            ->whereMonth('start_date', $currentMonth)
            ->leftJoin('services', 'bookings.service_id', '=', 'services.service_id')
            ->where('bookings.status', 'Completed')
            ->selectRaw('COALESCE((SUM(services.service_cost) * 0.10) + (COUNT(bookings.booking_id) * 500), 0) as monthly_commission')
            ->value('monthly_commission');
    }

    public function purchase()
    {
        return view('page.purchase');
    }
    public function void_logs()
    {
        $voids = booking::all();
        return view('page.void-logs' , compact('voids'));

    }
    public function product_list()
    {
        $products = \App\Models\product::all();
        $categories = category::all();
        return view('page.product-list', compact('products', 'categories'));
    }
    public function order_list()
    {
        $orders = order::all();

        $paymentCounts = [
            'pending' => order::where('payment_status', 'Pending')->count(),
            'paid' => order::where('payment_status', 'Paid')->count(),
            'failed' => order::where('payment_status', 'Failed')->count(),
            'cancelled' => order::where('payment_status', 'Cancelled')->count()
        ];

      
        return view('page.order-list', compact('orders', 'paymentCounts'));
    }
    public function order_details()
    {
        $order = order::all();
        return view('page.order-details', compact('order'));
    }
    public function add_product()
    {
        $suppliers = supplier::all();
        $categories = category::all();
        return view('page.add-product', compact('categories','suppliers'));
    }
    public function add_order()
    {
        $products = \App\Models\product::select('id', 'name', 'base_price')->get();
        return view('page.add-order', compact('products'));
    }

   public function category_list()
    {
        $categories = category::all();
        return view('page.category-list', compact('categories'));

    }
    public function waste_list(){
        $wastes = \App\Models\waste::all();
        return view('page.waste-list', compact('wastes'));
    }
    public function system_settings()
    {
        return view('page.system-settings');
    }
    public function new_services()
    {
        $branches = branch::all();
        return view('page.new-services', compact('branches'));
    }
    public function services_list()
    {
        $services = service::all();
        $branches = Branch::all();
        return view('page.services-list', compact('services', 'branches'));
    }
    public function new_user()
    {
        $branches = Branch::all();
        return view('page.new-user', compact('branches'));
    }
    public function user_list()
    {
        $users = \App\Models\User::with('branch')->get();
        return view('page.user-list', compact('users'));
    }
    public function booking()
    {
        $services = service::all();
        $branches = Branch::all();
        $patients = patient::all();
        $staffs =   staff::all();
        return view('page.booking', compact('services', 'staffs', 'branches', 'patients'));
        
    }

    public function new_package()
    {
        $branches = branch::all();
        $services = service::all();
        return view('page.new-package', compact('branches', 'services'));
    }

    public function packages_list()
    {
        $packages = \App\Models\Package::with(['branch', 'services'])->get();
        return view('page.packages-list', compact('packages'));
    }

}

