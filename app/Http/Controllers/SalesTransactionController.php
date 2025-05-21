<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\booking;
use App\Models\service;
use App\Models\staff;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SalesTransactionController extends Controller
{
    public function index(Request $request)
    {
        $sales = $this->getSalesData();
        $metrics = $this->calculateMetrics($sales);

        return view('page.sales-transaction', [
            'sales' => $sales,
            'metrics' => $metrics
        ]);
    }

    public function filter(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $sales = $this->getSalesData($startDate, $endDate);
        $metrics = $this->calculateMetrics($sales);

        return view('page.sales-transaction', [
            'sales' => $sales,
            'metrics' => $metrics,
            'startDate' => $startDate,
            'endDate' => $endDate
        ]);
    }

    protected function getSalesData($startDate = null, $endDate = null)
    {
        // Get order sales (product sales)
        $orders = $this->getOrderSales($startDate, $endDate);

        // Get service sales (from bookings)
        $serviceSales = $this->getServiceSales($startDate, $endDate);

        // Combine and sort all sales by date
        $allSales = $orders->concat($serviceSales)->sortByDesc('date');

        return $allSales;
    }

    protected function getOrderSales($startDate = null, $endDate = null)
    {
        $query = Order::with(['orderItems'])
                    ->orderBy('order_date', 'desc');

        if ($startDate && $endDate) {
            $query->whereBetween('order_date', [$startDate, $endDate]);
        }

        return $query->get()->map(function($order) {
            // Get the first item name as the service/product name
            $serviceName = $order->orderItems->isNotEmpty()
                ? $order->orderItems->first()->item_name
                : 'Order #' . $order->order_number;

            return [
                'service_name' => $serviceName,
                'customer_name' => $order->customer_name ?? 'N/A',
                'staff_name' => 'N/A', // Orders might not have staff assigned
                'amount' => $order->total,
                'branch_name' => $this->determineBranch($order) ?? 'N/A',
                'date' => $order->order_date ? Carbon::parse($order->order_date)->format('M d, Y') : 'N/A',
                'type' => 'product', // Assuming orders are for products
                'description' => $this->generateOrderDescription($order),
                'source' => 'order'
            ];
        });
    }

    protected function getServiceSales($startDate = null, $endDate = null)
    {
        // Query bookings with completed/paid status that are linked to services
        $query = booking::with(['services', 'patient', 'staff', 'branch'])
                ->whereIn('status', ['Completed', 'Paid'])
                ->orderBy('start_date', 'desc');

        if ($startDate && $endDate) {
            $query->whereBetween('start_date', [$startDate, $endDate]);
        }

        return $query->get()->flatMap(function($booking) {
            // For each booking, create an entry for each service
            if ($booking->services->isEmpty()) {
                return []; // Skip if no services are attached
            }

            return $booking->services->map(function($service) use ($booking) {
                return [
                    'service_name' => $service->service_name,
                    'customer_name' => $booking->patient ? $booking->patient->firstname . ' ' . $booking->patient->lastname : 'N/A',
                    'staff_name' => $booking->staff ? $booking->staff->firstname . ' ' . $booking->staff->lastname : 'N/A',
                    'amount' => $service->service_cost,
                    'branch_name' => $booking->branch ? $booking->branch->branch_name : 'N/A',
                    'date' => $booking->start_date ? Carbon::parse($booking->start_date)->format('M d, Y') : 'N/A',
                    'type' => 'service',
                    'description' => "Service ID: {$service->service_id}, Booking ID: {$booking->booking_id}",
                    'source' => 'booking'
                ];
            });
        });
    }

    protected function determineBranch($order)
    {
        // Replace with your actual branch determination logic
        // This could be from a relationship if orders have branches
        return 'Main Branch'; // Default value
    }

    protected function generateOrderDescription($order)
    {
        $itemCount = $order->orderItems->count();
        $topItems = $order->orderItems->take(2)->pluck('item_name')->implode(', ');

        if ($itemCount > 2) {
            return "Contains {$topItems} and " . ($itemCount - 2) . " more item(s)";
        }
        return "Contains {$topItems}";
    }

    protected function calculateMetrics($sales)
    {
        // Calculate total sales
        $totalSales = $sales->sum('amount');

        // Calculate product sales (items with type 'product')
        $productSales = $sales->where('type', 'product')->sum('amount');

        // Calculate service sales (items with type 'service')
        $serviceSales = $sales->where('type', 'service')->sum('amount');

        // Calculate today's sales (both products and services)
        $today = Carbon::today()->format('M d, Y');
        $dailySales = $sales->where('date', $today)->sum('amount');

        return [
            'totalSales' => $totalSales,
            'productSales' => $productSales,
            'serviceSales' => $serviceSales,
            'dailySales' => $dailySales
        ];
    }
}
