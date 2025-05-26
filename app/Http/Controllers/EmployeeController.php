<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\staff;
use App\Models\booking;
use App\Models\service;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class EmployeeController extends Controller
{
    public function index()
    {
        // Get all employees with their booking information
        $employees = DB::table('staff')
            ->select(
                'staff.id',
                DB::raw('CONCAT(staff.firstname, " ", staff.lastname) as employee_name'),
                DB::raw('COUNT(DISTINCT bookings.booking_id) as service_count'),
                DB::raw('COALESCE(SUM(bookings.payment), 0) as total_service_sales')
            )
            ->leftJoin('bookings', 'staff.id', '=', 'bookings.id')
            ->groupBy('staff.id', 'staff.firstname', 'staff.lastname')
            ->orderBy('staff.firstname')
            ->get();

        // Calculate total sales
        $totalSales = $employees->sum('total_service_sales');
        
        // Get monthly sales - only from bookings linked to staff
        $currentMonth = now()->month;
        $currentYear = now()->year;
        $monthlySales = DB::table('staff')
            ->leftJoin('bookings', 'staff.id', '=', 'bookings.id')
            ->whereMonth('bookings.start_date', $currentMonth)
            ->whereYear('bookings.start_date', $currentYear)
            ->sum('bookings.payment');
        
        // Find top performing employee (by sales)
        $topEmployee = $employees->sortByDesc('total_service_sales')->first();

        $totalMetrics = [
            'total_sales' => $totalSales,
            'monthly_sales' => $monthlySales,
            'top_employee' => $topEmployee
        ];

        return view('page.employee-sales', compact('employees', 'totalMetrics'));
    }
}