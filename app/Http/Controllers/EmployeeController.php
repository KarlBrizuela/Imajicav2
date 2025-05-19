<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\staff;
use App\Models\booking;
use App\Models\service;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = DB::table('staff')
            ->select(
                'staff.id',
                'staff.firstname',
                'staff.lastname',
                DB::raw('COUNT(DISTINCT bookings.booking_id) as service_count'),
                DB::raw('COUNT(DISTINCT bookings.patient_id) as client_count'),
                DB::raw('COALESCE(SUM(CASE WHEN bookings.status = "Completed" THEN services.service_cost ELSE 0 END), 0) as total_service_sales'),
                DB::raw('COALESCE(SUM(CASE WHEN bookings.status = "Completed" THEN services.service_cost ELSE 0 END), 0) as total_sales')
            )
            ->leftJoin('bookings', 'staff.id', '=', 'bookings.id')
            ->leftJoin('services', 'bookings.service_id', '=', 'services.service_id')
            ->groupBy('staff.id', 'staff.firstname', 'staff.lastname')
            ->orderBy('staff.firstname')
            ->get();

        // Calculate total metrics for the header cards
        $totalMetrics = [
            'total_sales' => $employees->sum('total_sales'),
            'monthly_sales' => $this->getMonthlySales(),
            'top_employee' => $employees->sortByDesc('total_sales')->first()
        ];

        return view('page.employee-sales', compact('employees', 'totalMetrics'));
    }

    private function getMonthlySales()
    {
        $currentMonth = now()->month;
        return booking::whereMonth('start_date', $currentMonth)
            ->leftJoin('services', 'bookings.service_id', '=', 'services.service_id')
            ->sum('services.service_cost');
    }

    public function create()
    {
        // Logic to show the form for creating a new transaction
    }

    public function store(Request $request)
    {
        // Logic to save a new transaction
    }

    public function edit($id)
    {
        // Logic to show the form for editing a transaction
    }

    public function update(Request $request, $id)
    {
        // Logic to update a transaction
    }

    public function destroy($id)
    {
        // Logic to delete a transaction
    }
}
