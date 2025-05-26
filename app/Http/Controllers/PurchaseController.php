<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PurchaseController extends Controller
{
    public function index()
    {
        // Get purchase statistics
        $stats = [
            'total_purchase' => OrderItem::sum(DB::raw('quantity * unit_price')),
            'monthly_purchase' => OrderItem::whereMonth('created_at', now()->month)
                ->sum(DB::raw('quantity * unit_price')),
            'weekly_purchase' => OrderItem::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])
                ->sum(DB::raw('quantity * unit_price')),
            'most_ordered' => OrderItem::select('item_name', DB::raw('SUM(quantity) as total_quantity'))
                ->groupBy('item_name')
                ->orderBy('total_quantity', 'desc')
                ->first()
        ];

        // Get orders data with debugging
        $orders = Order::select(
            'order_number',
            'order_date',
            'payment_status',
            'payment_method',
            'total'
        )->get();

        // Debug output
        if ($orders->isEmpty()) {
            Log::info('No orders found in database');
        } else {
            Log::info('Found orders:', ['count' => $orders->count(), 'first_order' => $orders->first()]);
        }

        return view('page.purchase', compact('stats', 'orders'));
    }
}
