<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EmployeeReportController extends Controller
{
    public function index()
    {
        // Fetch employee reports from the database
        $employeeReports = DB::table('employee_report')
            ->select('id', 'date', 'employeeName', 'product_service', 'product_serviceName', 
                    'quantity', 'client', 'totalSales')
            ->orderBy('date', 'desc')
            ->get();
        
        $employeeReports = $employeeReports->map(function($report) {
        $report->date = Carbon::parse($report->date)->format('Y-m-d');
        return $report;
        });
        
        // Calculate metrics for the summary cards
        $totalSales = $employeeReports->sum('totalSales');
        
        // Group by employee name and get top employee
        $employeeSalesData = $employeeReports->groupBy('employeeName')
            ->map(function ($group) {
                return [
                    'name' => $group->first()->employeeName,
                    'totalSales' => $group->sum('totalSales')
                ];
            })
            ->sortByDesc('totalSales');
        
        $topEmployeeName = count($employeeSalesData) > 0 ? $employeeSalesData->first()['name'] : 'N/A';
        $topEmployeeSales = count($employeeSalesData) > 0 ? $employeeSalesData->first()['totalSales'] : 0;
        
        return view('page.employee-report', compact(
            'employeeReports', 
            'totalSales', 
            'topEmployeeName', 
            'topEmployeeSales'
        ));
    }
    
    // API endpoint for getting employee details
    public function getEmployee($id)
    {
        // In a real app, you would fetch this from the database
        // This is placeholder data for the example
        return response()->json([
            'id' => $id,
            'position' => 'Sales Associate',
            'email' => 'employee'.$id.'@imajica.com',
            'phone' => '+63 9XX XXX XXXX',
            'start_date' => '2023-01-15',
        ]);
    }
    
    // API endpoint for getting employee transactions
    public function getEmployeeTransactions($id)
    {
        // In a real app, you would fetch this from the database
        // This is placeholder data for the example
        $transactions = DB::table('employee_report')
            ->where('id', $id)
            ->select('id', 'date', 'product_service as type', 'client as client_name', 
                    DB::raw("'Completed' as status"), 'totalSales as amount')
            ->get();
        
        return response()->json($transactions);
    }
}