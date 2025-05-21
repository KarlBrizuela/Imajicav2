<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ServiceProductController extends Controller
{
    public function index()
    {
        // Get all orders with their items ordered by date
        $orders = Order::with('orderItems')
                      ->orderBy('order_date', 'desc')
                      ->get();

        // Calculate sales metrics from orders
        $dailySales = Order::whereDate('order_date', today())->sum('total');
        $monthlySales = Order::whereMonth('order_date', now()->month)->sum('total');
        $totalSales = Order::sum('total');

        // Transform orders data for the view
        $services = $orders->map(function($order) {
            // Ensure order_date is a Carbon instance
            $orderDate = is_string($order->order_date)
                ? Carbon::parse($order->order_date)
                : $order->order_date;

            return (object)[
                'service_name' => $this->getServiceName($order),
                'date' => $orderDate->format('Y-m-d'),
                'branch_name' => $this->determineBranch($order),
                'service_category' => $order->payment_method,
                'formatted_cost' => '₱' . number_format($order->total, 2),
                'type' => $order->order_status,
                'description' => $this->generateOrderDescription($order)
            ];
        });

        return view('page.service-product', [
            'services' => $services,
            'dailySales' => $dailySales,
            'monthlySales' => $monthlySales,
            'totalSales' => $totalSales
        ]);
    }

    // Add the missing method
    protected function getServiceName($order)
    {
        if ($order->orderItems->isNotEmpty()) {
            return $order->orderItems->first()->item_name;
        }
        return 'Order #' . $order->order_number;
    }

    protected function determineBranch($order)
    {
        // Replace with your actual branch determination logic
        return 'Main Branch';
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
}
