<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Booking;
use App\Models\Service;
use App\Models\Package;
use App\Models\Staff;
use App\Models\Branch;

class EmployeeReportController extends Controller
{
    public function index()
    {
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        // Fetch booking data with relationships
        $bookings = Booking::with(['services', 'packages', 'staff', 'branch'])
            ->orderBy('start_date', 'desc')
            ->get();

        // Transform booking data
        $employeeReports = $bookings->map(function($booking) {
            $serviceNames = $booking->services->pluck('service_name')->implode(', ');
            $packageNames = $booking->packages->pluck('package_name')->implode(', ');
            
            $productServiceName = !empty($packageNames) ? $packageNames : $serviceNames;
            $productServiceType = !empty($packageNames) ? 'Package' : 'Service';
            
            return (object)[
                'id' => $booking->booking_id,
                'date' => Carbon::parse($booking->start_date)->format('Y-m-d'),
                'employeeName' => $booking->staff ? $booking->staff->firstname . ' ' . $booking->staff->lastname : 'Unassigned',
                'product_service' => $productServiceType,
                'product_serviceName' => $productServiceName,
                'totalSales' => $booking->payment ?? 0,
                'branchName' => $booking->branch ? $booking->branch->branch_name : 'N/A',
                'start_time' => Carbon::parse($booking->start_date)->format('h:i A'),
                'end_time' => Carbon::parse($booking->end_date)->format('h:i A'),
                'booking_month' => Carbon::parse($booking->start_date)->month,
                'booking_year' => Carbon::parse($booking->start_date)->year
            ];
        });

        // Calculate total sales (all time)
        $totalSales = $employeeReports->sum('totalSales');

        // Calculate monthly sales (current month only)
        $monthlySales = $employeeReports->filter(function($report) use ($currentMonth, $currentYear) {
            return $report->booking_month == $currentMonth && $report->booking_year == $currentYear;
        })->sum('totalSales');

        // Calculate top employee (excluding Unassigned)
        $employeeSalesData = $employeeReports->filter(function($report) {
            return $report->employeeName !== 'Unassigned';
        })
        ->groupBy('employeeName')
        ->map(function($group) {
            return [
                'name' => $group->first()->employeeName,
                'totalSales' => $group->sum('totalSales')
            ];
        })
        ->sortByDesc('totalSales');

        // Set top employee values
        $topEmployeeName = $employeeSalesData->isNotEmpty() 
            ? $employeeSalesData->first()['name']
            : 'N/A';
            
        $topEmployeeSales = $employeeSalesData->isNotEmpty()
            ? $employeeSalesData->first()['totalSales']
            : 0;

        return view('page.employee-report', compact(
            'employeeReports',
            'totalSales',
            'monthlySales',
            'topEmployeeName',
            'topEmployeeSales'
        ));
    }
    
    // API endpoint for getting employee details
    public function getEmployee($id)
    {
        // Get staff details from the staff table
        $employee = staff::with('position')->find($id);
        
        if (!$employee) {
            return response()->json(['error' => 'Employee not found'], 404);
        }
        
        return response()->json([
            'id' => $employee->id,
            'name' => $employee->firstname . ' ' . $employee->lastname,
            'position' => $employee->position ? $employee->position->position_name : 'Unknown',
            'email' => $employee->email ?? 'No Email',
            'phone' => $employee->phone ?? 'No Phone',
        ]);
    }
    
    // API endpoint for getting employee transactions
    public function getEmployeeTransactions($id)
    {
        // Fetch booking data for the specific staff member
        // Focus only on: date & time, service/package, branch, and payment
        $transactions = booking::with(['services', 'packages', 'branch'])
            ->where('id', $id) // staff id field in bookings
            ->orderBy('start_date', 'desc')
            ->get()
            ->map(function($booking) {
                // Get service and package information
                $serviceNames = $booking->services->pluck('service_name')->implode(', ');
                $packageNames = $booking->packages->pluck('package_name')->implode(', ');
                
                return [
                    'id' => $booking->booking_id,
                    'date' => Carbon::parse($booking->start_date)->format('Y-m-d'),
                    'time' => Carbon::parse($booking->start_date)->format('h:i A'),
                    'service_name' => !empty($packageNames) ? $packageNames : $serviceNames,
                    'service_type' => !empty($packageNames) ? 'Package' : 'Service',
                    'branch' => $booking->branch ? $booking->branch->branch_name : 'N/A',
                    'payment' => $booking->payment ?? 0
                ];
            });
        
        return response()->json($transactions);
    }
}