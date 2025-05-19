<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EmployeeReportController extends Controller
{
    /**
     * Display the employee report page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get overall metrics - assuming there's a booking_cost or service_cost column
        $totalSales = DB::table('bookings')
            ->join('services', 'bookings.service_id', '=', 'services.service_id')
            ->where('bookings.status', 'Completed')
            ->sum('services.service_cost');
        
        // Get top staff sales
        $topEmployeeSales = DB::table('bookings')
            ->join('staff', 'bookings.id', '=', 'staff.id')
            ->join('services', 'bookings.service_id', '=', 'services.service_id')
            ->where('bookings.status', 'Completed')
            ->select(DB::raw('SUM(services.service_cost) as total_sales'))
            ->groupBy('staff.id')
            ->orderBy('total_sales', 'desc')
            ->value('total_sales') ?? 0;
            
        // Get top staff name
        $topEmployeeName = DB::table('bookings')
            ->join('staff', 'bookings.id', '=', 'staff.id')
            ->join('services', 'bookings.service_id', '=', 'services.service_id')
            ->where('bookings.status', 'Completed')
            ->select('staff.firstname', 'staff.lastname', DB::raw('SUM(services.service_cost) as total_sales'))
            ->groupBy('staff.id', 'staff.firstname', 'staff.lastname')
            ->orderBy('total_sales', 'desc')
            ->first();
            
        $topEmployeeName = $topEmployeeName ? $topEmployeeName->firstname . ' ' . $topEmployeeName->lastname : 'N/A';
        
        // Get staff data for the table
        $employees = DB::table('staff')
            ->join('bookings', 'staff.id', '=', 'bookings.id')
            ->join('services', 'bookings.service_id', '=', 'services.service_id')
            ->select(
                'staff.id',
                DB::raw('CONCAT(staff.firstname, " ", staff.lastname) as name'),
                DB::raw('MAX(bookings.start_date) as last_booking'),
                DB::raw('COUNT(CASE WHEN bookings.status = "Completed" THEN 1 END) as service_count'),
                DB::raw('0 as product_count'), // Use 0 for product_count if there's no product sales functionality
                DB::raw('COUNT(DISTINCT bookings.patient_id) as client_count'),
                DB::raw('SUM(CASE WHEN bookings.status = "Completed" THEN services.service_cost ELSE 0 END) as service_total'),
                DB::raw('0 as product_total'), // Use 0 for product_total if there's no product sales
                DB::raw('SUM(CASE WHEN bookings.status = "Completed" THEN services.service_cost ELSE 0 END) as total_sales')
            )
            ->groupBy('staff.id', 'staff.firstname', 'staff.lastname')
            ->orderBy('total_sales', 'desc')
            ->get();
        
        return view('page.employee-report', compact(
            'totalSales', 
            'topEmployeeSales', 
            'topEmployeeName', 
            'employees'
        ));
    }
} 