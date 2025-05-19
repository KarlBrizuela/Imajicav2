<?php

namespace App\Http\Controllers;
use App\Models\supplier;
use App\Models\Patient;
use Carbon\Carbon;
use App\Models\Branch;
use App\Models\coupon;
use App\Models\tier;
use App\Models\staff;
use App\Models\booking;
use App\Models\category;
use Illuminate\Http\Request;
use App\Models\service;
use App\Models\order;

use App\Models\positionModel;

use App\Models\category_expense;

use Illuminate\Support\Facades\DB;
use App\Models\Department;

class DashboardController extends Controller
{
    // Add this method to fix the "Method does not exist" error
    public function dashboard()
    {
        // Simply call the index method to avoid duplicating code
        return $this->index();
    }
    
    public function index()
    {
        // Get all patients for count try mos
        $patients = Patient::all();
        $bookings = booking::all();
        $services = service::all();
        
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
        $branchData = Branch::with(['bookings', 'bookings.service'])
            ->get()
            ->map(function ($branch) {
                $totalBookings = $branch->bookings->count();
                $totalRevenue = $branch->bookings->sum(function ($booking) {
                    return $booking->service ? $booking->service->service_cost : 0;
                });
                
                return [
                    'name' => $branch->branch_name,
                    'bookings' => $totalBookings,
                    'revenue' => $totalRevenue
                ];
            });

        return view('page.dashboard', compact(
            'patients', 
            'bookings', 
            'services',
            'patientGrowth', 
            'bookingGrowth', 
            'todayBirthdays', 
            'upcomingBirthdays', 
            'allBirthdays',
            'branchData'
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
    
        return view('page.newcategory-expenses');
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
        // Check if we're in development/testing mode
        if (config('app.env') === 'local' || config('app.env') === 'testing') {
            // Create mock departments if none exist
            if (Department::count() === 0) {
                $mockDepartments = [
                    [
                        'department_code' => 'HR',
                        'department_name' => 'Human Resources',
                        'description' => 'Handles recruitment, training, and employee relations'
                    ],
                    [
                        'department_code' => 'IT',
                        'department_name' => 'Information Technology',
                        'description' => 'Manages software, hardware, and technical infrastructure'
                    ],
                    [
                        'department_code' => 'FIN',
                        'department_name' => 'Finance',
                        'description' => 'Handles accounting, budgeting, and financial planning'
                    ],
                    [
                        'department_code' => 'MKT',
                        'department_name' => 'Marketing',
                        'description' => 'Responsible for advertising, promotions, and brand management'
                    ],
                    [
                        'department_code' => 'OPS',
                        'department_name' => 'Operations',
                        'description' => 'Manages day-to-day business processes and logistics'
                    ],
                    [
                        'department_code' => 'SALES',
                        'department_name' => 'Sales',
                        'description' => 'Handles customer acquisition and revenue generation'
                    ],
                    [
                        'department_code' => 'R&D',
                        'department_name' => 'Research & Development',
                        'description' => 'Focuses on innovation and product development'
                    ],
                    [
                        'department_code' => 'LEGAL',
                        'department_name' => 'Legal',
                        'description' => 'Provides legal counsel and ensures compliance'
                    ]
                ];
                
                foreach ($mockDepartments as $department) {
                    Department::create($department);
                }
            }
        }
        
        $departments = Department::with('head')->get();
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
    public function expenses_report()
    {
        return view('page.expenses-report');
    }

    public function sales_transaction()
    {
            $sales = booking::all();
        return view('page.sales-transaction', compact('sales'));
    }
    public function employee_sales()
    {
       
        $employees = staff::all();
        return view('page.employee-sales', compact('employees'));
    }

    public function commision_employee()
    {
        return view('page.commision-employee');
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
        $products = \App\Models\Product::all();
        $categories = category::all();
        return view('page.product-list', compact('products', 'categories'));
    }
    public function order_list()
    {
        $orders = order::all();
        return view('page.order-list', compact('orders'));
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
        $products = \App\Models\Product::select('id', 'name', 'base_price')->get();
        return view('page.add-order', compact('products'));
    }

   public function category_list()
    {
        $categories = category::all();
        return view('page.category-list', compact('categories'));

    }
    public function waste_list(){
        $wastes = \App\Models\Waste::all();
        return view('page.waste-list', compact('wastes'));
    }
    public function system_settings()
    {
        return view('page.system-settings');
    }
    public function new_services()
    {
        // Get all branches to display in the form
        $branches = Branch::all();
        $services = service::all();
        
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
        return view('page.user-list');
    }
    public function booking()
    {
        $services = service::all();
        $branches = Branch::all();
        $patients = patient::all();
        $staffs =   staff::all();
        return view('page.booking', compact('services', 'staffs', 'branches', 'patients'));
        
    }


}

