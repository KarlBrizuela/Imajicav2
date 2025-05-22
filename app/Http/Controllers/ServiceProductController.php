<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Booking;
use App\Models\Service;
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

        // Get all bookings with their services
        $bookings = Booking::with(['services', 'branch'])
                      ->whereIn('status', ['Completed', 'Paid'])
                      ->orderBy('start_date', 'desc')
                      ->get();

        // Calculate sales metrics from orders and bookings
        $dailySales = $this->calculateDailySales($orders, $bookings);
        $monthlySales = $this->calculateMonthlySales($orders, $bookings);
        $totalSales = $this->calculateTotalSales($orders, $bookings);

        // Transform orders data for the view
        $orderServices = $orders->map(function($order) {
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
                'payment_status' => $order->payment_status,
                'order_status' => $order->order_status,
                'description' => $this->generateOrderDescription($order)
            ];
        });

        // Transform bookings data for the view
        $bookingServices = $bookings->flatMap(function($booking) {
            return $booking->services->map(function($service) use ($booking) {
                return (object)[
                    'service_name' => $service->service_name,
                    'date' => Carbon::parse($booking->start_date)->format('Y-m-d'),
                    'branch_name' => $booking->branch ? $booking->branch->branch_name : 'Main Branch',
                    'service_category' => 'Service',
                    'formatted_cost' => '₱' . number_format($service->service_cost, 2),
                    'payment_status' => $booking->status === 'Paid' ? 'Paid' : 'Pending',
                    'order_status' => $booking->status,
                    'description' => "Service ID: {$service->service_id}, Booking ID: {$booking->booking_id}"
                ];
            });
        });

        // Combine and sort all services by date
        $services = $orderServices->concat($bookingServices)->sortByDesc('date');

        return view('page.service-product', [
            'services' => $services,
            'dailySales' => $dailySales,
            'monthlySales' => $monthlySales,
            'totalSales' => $totalSales
        ]);
    }

    protected function calculateDailySales($orders, $bookings)
    {
        $today = today();

        // Filter orders for today and sum their totals
        $orderSales = $orders->filter(function($order) use ($today) {
            return Carbon::parse($order->order_date)->isSameDay($today);
        })->sum('total');

        // Filter bookings for today and sum their service costs
        $bookingSales = $bookings->filter(function($booking) use ($today) {
            return Carbon::parse($booking->start_date)->isSameDay($today);
        })->sum(function($booking) {
            return $booking->services->sum('service_cost');
        });

        return $orderSales + $bookingSales;
    }

    protected function calculateMonthlySales($orders, $bookings)
    {
        $currentMonth = now()->month;
        $currentYear = now()->year;

        // Filter orders for current month and sum their totals
        $orderSales = $orders->filter(function($order) use ($currentMonth, $currentYear) {
            $date = Carbon::parse($order->order_date);
            return $date->month === $currentMonth && $date->year === $currentYear;
        })->sum('total');

        // Filter bookings for current month and sum their service costs
        $bookingSales = $bookings->filter(function($booking) use ($currentMonth, $currentYear) {
            $date = Carbon::parse($booking->start_date);
            return $date->month === $currentMonth && $date->year === $currentYear;
        })->sum(function($booking) {
            return $booking->services->sum('service_cost');
        });

        return $orderSales + $bookingSales;
    }

    protected function calculateTotalSales($orders, $bookings)
    {
        // Sum all order totals
        $orderSales = $orders->sum('total');

        // Sum all booking service costs
        $bookingSales = $bookings->sum(function($booking) {
            return $booking->services->sum('service_cost');
        });

        return $orderSales + $bookingSales;
    }

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
