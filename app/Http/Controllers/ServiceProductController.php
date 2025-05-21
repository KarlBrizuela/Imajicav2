<?php

namespace App\Http\Controllers;

use App\Models\ServiceProduct;
use Illuminate\Http\Request;

class ServiceProductController extends Controller
{
    public function index()
    {
        // Get all service products ordered by date
        $services = ServiceProduct::orderBy('date', 'desc')->get();

        // Calculate sales metrics
        $dailySales = ServiceProduct::whereDate('date', today())->sum('service_cost');
        $monthlySales = ServiceProduct::whereMonth('date', now()->month)->sum('service_cost');
        $totalSales = ServiceProduct::sum('service_cost');

        return view('page.service-product', [
            'services' => $services,
            'dailySales' => $dailySales,
            'monthlySales' => $monthlySales,
            'totalSales' => $totalSales
        ]);
    }

    public function getServiceDetails($id)
    {
        $serviceProduct = ServiceProduct::findOrFail($id);

        return response()->json([
            'service' => [
                'id' => $serviceProduct->id,
                'name' => $serviceProduct->service_name,
                'date' => $serviceProduct->date,
                'branch' => $serviceProduct->branch_name,
                'description' => $serviceProduct->description,
                'category' => $serviceProduct->service_category,
                'price' => $serviceProduct->service_cost,
                'type' => $serviceProduct->type,
                'formatted_cost' => $serviceProduct->formatted_cost
            ],
            // These would need actual relationships if you want real data
            'totalSales' => 0,
            'transactions' => [],
            'monthlyTrend' => $this->getMonthlyTrend($id)
        ]);
    }

    protected function getMonthlyTrend($serviceProductId)
    {
        // Sample data - replace with actual query if needed
        return [
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            'data' => [1500, 2100, 1800, 2400, 1900, 2200]
        ];
    }
}
