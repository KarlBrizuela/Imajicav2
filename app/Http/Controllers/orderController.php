<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function create(Request $request)
    {
        try {
            // Validate request data
            $validator = Validator::make($request->all(), [
                'customer_name' => 'required|string|max:255',
                'customer_email' => 'required|email|max:255',
                'order_date' => 'required|date',
                'order_time' => 'required',
                'payment_status' => 'required|in:Paid,Pending,Failed,Cancelled',
                'order_status' => 'required|in:Ordered,Delivered,Out for Delivery,Ready to Pickup',
                'payment_method' => 'required|string',
                'subtotal' => 'required|numeric|min:0',
                'tax' => 'required|numeric|min:0',
                'total' => 'required|numeric|min:0',
                'items' => 'required|json'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            }

            // Decode and validate items
            $items = json_decode($request->items, true);
            if (!is_array($items) || empty($items)) {
                throw new \Exception('Invalid or empty items array');
            }

            // Start transaction
            DB::beginTransaction();

            // Log the attempt to create order
            Log::info('Attempting to create order', [
                'customer' => $request->customer_name,
                'email' => $request->customer_email,
                'total_items' => count($items)
            ]);

            // Create the order
            $order = order::create([
                'order_date' => $request->order_date . ' ' . $request->order_time,
                'customer_name' => $request->customer_name,
                'customer_email' => $request->customer_email,
                'payment_status' => $request->payment_status,
                'order_status' => $request->order_status,
                'payment_method' => $request->payment_method,
                'subtotal' => $request->subtotal,
                'tax' => $request->tax,
                'total' => $request->total
            ]);

            if (!$order) {
                throw new \Exception('Failed to create order record');
            }

            // Create order items
            foreach ($items as $item) {
                // Validate each item
                if (!isset($item['name'], $item['quantity'], $item['price'], $item['total'])) {
                    throw new \Exception('Invalid item data structure');
                }

                $orderItem = OrderItem::create([
                    'order_id' => $order->order_id,
                    'item_name' => $item['name'],
                    'quantity' => $item['quantity'],
                    'unit_price' => $item['price'],
                    'total' => $item['total']
                ]);

                if (!$orderItem) {
                    throw new \Exception('Failed to create order item: ' . $item['name']);
                }
            }

            DB::commit();
            
            Log::info('Order created successfully', [
                'order_id' => $order->order_id,
                'order_number' => $order->order_number
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Order created successfully',
                'data' => [
                    'order_id' => $order->order_id,
                    'order_number' => $order->order_number
                ]
            ], 201);

        } catch (\Exception $e) {
            DB::rollback();
            
            Log::error('Order creation failed', [
                'error' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile(),
                'trace' => $e->getTraceAsString()
            ]);

            $errorMessage = 'Failed to create order: ';
            if (app()->environment('local')) {
                $errorMessage .= $e->getMessage();
            } else {
                $errorMessage .= 'An unexpected error occurred';
            }

            return response()->json([
                'status' => 'error',
                'message' => $errorMessage,
                'debug' => app()->environment('local') ? [
                    'error' => $e->getMessage(),
                    'line' => $e->getLine(),
                    'file' => $e->getFile()
                ] : null
            ], 500);
        }
    }

    public function index()
    {
        $orders = order::with('orderItems')->get();

    

        return view('page.order-list', compact('orders'));
    }

    public function show($id)
    {
        try {
            $order = order::with(['orderItems.product'])->findOrFail($id);
            return view('page.order-details', compact('order'));
        } catch (\Exception $e) {
            return redirect()->route('page.order-list')
                           ->with('error', 'Order not found.');
        }
    }

    public function getOrderDetails($orderId)
    {
        $order = order::where('order_id', $orderId)->first();
    
        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }
    
        $items = DB::table('order_items')
            ->join('new_product', 'order_items.item_name', '=', 'new_product.name')
            ->select(
                'order_items.item_id',
                'order_items.item_name',
                'order_items.quantity',
                'order_items.unit_price',
                'order_items.total',
                'new_product.product_image'
            )
            ->where('order_items.order_id', $orderId)
            ->get();
    
        return response()->json([
            'number' => $order->order_number,
            'date' => $order->created_at->format('M d, Y'),
            'status' => $order->order_status,
            'payment' => $order->payment_method,
            'customer' => [
                'name' => $order->customer_name,
                'email' => $order->customer_email
            ],
            'items' => $items
        ]);
    }

    public function delete(Request $request)
    {
        try {
            $orderId = $request->input('order_id');
            $order = order::findOrFail($orderId);
                
            // Delete related order items first 
            $order->orderItems()->delete();
            
            // Then delete the order
            $order->delete();

            if ($request->wantsJson()) {
                return response()->json([
                    'status' => true,
                    'message' => 'Order deleted successfully'
                ]);
            }

            return redirect()->route('page.order-list')
                ->with('success', 'Order deleted successfully!');

        } catch (\Exception $e) {
            Log::error('Error deleting order:', [
                'order_id' => $orderId,
                'error' => $e->getMessage()
            ]);

            if ($request->wantsJson()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Failed to delete order: ' . $e->getMessage()
                ], 500);
            }

            return redirect()->back()
                ->with('error', 'Failed to delete order: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        try {
            // Find the order with its items
            $order = order::with('orderItems')->findOrFail($id);
            
            // Get all products for the dropdown
            $products = DB::table('new_product')->get();
            
            return view('page.edit-order', compact('order', 'products'));
        } catch (\Exception $e) {
            Log::error('Error loading order for edit:', [
                'order_id' => $id,
                'error' => $e->getMessage()
            ]);
            
            return redirect()->route('page.order-list')
                ->with('error', 'Order not found or could not be loaded for editing.');
        }
    }
    
    public function update(Request $request)
    {
        try {
            // Validate request data
            $validator = Validator::make($request->all(), [
                'order_id' => 'required|exists:new_order_table,order_id',
                'customer_name' => 'required|string|max:255',
                'customer_email' => 'required|email|max:255',
                'order_date' => 'required|date',
                'order_time' => 'required',
                'payment_status' => 'required|in:Paid,Pending,Failed,Cancelled',
                'order_status' => 'required|in:Ordered,Delivered,Out for Delivery,Ready to Pickup',
                'payment_method' => 'required|string',
                'subtotal' => 'required|numeric|min:0',
                'tax' => 'required|numeric|min:0',
                'total' => 'required|numeric|min:0',
                'items' => 'required|json'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            }

            // Decode and validate items
            $items = json_decode($request->items, true);
            if (!is_array($items) || empty($items)) {
                throw new \Exception('Invalid or empty items array');
            }

            // Start transaction
            DB::beginTransaction();

            // Log the attempt to update order
            Log::info('Attempting to update order', [
                'order_id' => $request->order_id,
                'customer' => $request->customer_name,
                'email' => $request->customer_email,
                'total_items' => count($items)
            ]);

            // Find and update the order
            $order = order::findOrFail($request->order_id);
            $order->update([
                'order_date' => $request->order_date . ' ' . $request->order_time,
                'customer_name' => $request->customer_name,
                'customer_email' => $request->customer_email,
                'payment_status' => $request->payment_status,
                'order_status' => $request->order_status,
                'payment_method' => $request->payment_method,
                'subtotal' => $request->subtotal,
                'tax' => $request->tax,
                'total' => $request->total
            ]);

            // Delete existing order items
            $order->orderItems()->delete();

            // Create new order items
            foreach ($items as $item) {
                // Validate each item
                if (!isset($item['name'], $item['quantity'], $item['price'], $item['total'])) {
                    throw new \Exception('Invalid item data structure');
                }

                $orderItem = OrderItem::create([
                    'order_id' => $order->order_id,
                    'item_name' => $item['name'],
                    'quantity' => $item['quantity'],
                    'unit_price' => $item['price'],
                    'total' => $item['total']
                ]);

                if (!$orderItem) {
                    throw new \Exception('Failed to create order item: ' . $item['name']);
                }
            }

            DB::commit();
            
            Log::info('Order updated successfully', [
                'order_id' => $order->order_id,
                'order_number' => $order->order_number
            ]);

            if ($request->wantsJson()) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Order updated successfully',
                    'data' => [
                        'order_id' => $order->order_id,
                        'order_number' => $order->order_number
                    ]
                ]);
            }

            return redirect()->route('page.order-list')
                ->with('success', 'Order updated successfully!');

        } catch (\Exception $e) {
            DB::rollback();
            
            Log::error('Order update failed', [
                'error' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile(),
                'trace' => $e->getTraceAsString()
            ]);

            $errorMessage = 'Failed to update order: ';
            if (app()->environment('local')) {
                $errorMessage .= $e->getMessage();
            } else {
                $errorMessage .= 'An unexpected error occurred';
            }

            if ($request->wantsJson()) {
                return response()->json([
                    'status' => 'error',
                    'message' => $errorMessage,
                    'debug' => app()->environment('local') ? [
                        'error' => $e->getMessage(),
                        'line' => $e->getLine(),
                        'file' => $e->getFile()
                    ] : null
                ], 500);
            }

            return redirect()->back()
                ->with('error', $errorMessage);
        }
    }
}
