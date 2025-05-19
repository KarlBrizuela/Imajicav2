<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

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

        // Get purchase records
        $purchases = OrderItem::select(
            'order_items.created_at',
            'new_order_table.order_number as trans_no',
            'new_order_table.customer_name as vendor_name',
            'order_items.item_name as product_ordered',
            'order_items.created_at as date_received',
            'new_order_table.customer_name as received_by',
            'order_items.quantity as qty',
            'order_items.total as amount',
            'new_order_table.payment_method as payment_terms'
        )
        ->join('new_order_table', 'order_items.order_id', '=', 'new_order_table.order_id')
        ->get();

        return view('page.purchase', compact('stats', 'purchases'));
    }
}
