<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\product;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function index()
    {
        $products = product::with('category')->get()->map(function($product) {
            return [
                'id' => $product->id,
                'name' => $product->name,
                'category' => $product->category->categoryTitle ?? 'Uncategorized',
                'stock_status' => $product->quantity > 0 ? 1 : 0,
                'sku' => $product->sku,
                'base_price' => $product->base_price,
                'quantity' => $product->quantity,
                'status' => $this->mapStatus($product->status),
                'product_image' => $product->product_image,
                'description' => $product->description
            ];
        });

        $categories = \App\Models\category::all()->pluck('categoryTitle')->toArray();

        return response()->json([
            'data' => $products,
            'categories' => $categories
        ]);
    }

    public function destroy($id)
    {
        try {
            $product = product::findOrFail($id);
            
            // Check if there are related order items
            $relatedOrderItems = OrderItem::where('item_name', $product->name)->first();
            
            if ($relatedOrderItems) {
                return response()->json([
                    'success' => false,
                    'message' => 'Cannot delete this product because it has related order items. You must delete the associated orders first.'
                ], 400);
            }
            
            $product->delete();
            return response()->json([
                'success' => true,
                'message' => 'Product deleted successfully'
            ]);
        } catch (\Exception $e) {
            Log::error('Error deleting product:', ['message' => $e->getMessage()]);
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while deleting the product: ' . $e->getMessage()
            ], 500);
        }
    }

    private function mapStatus($status)
    {
        switch ($status) {
            case 'Published':
                return 2;
            case 'Scheduled':
                return 1;
            case 'Inactive':
                return 3;
            default:
                return 3;
        }
    }
}
