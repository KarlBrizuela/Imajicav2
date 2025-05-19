<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\category;
use App\Models\supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class AddProductController extends Controller
{
    public function index()
    {
        return view('page.add-product');
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'sku' => 'required|string|unique:new_product',
            'name' => 'required|string|max:255',
            'product_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|exists:categories,category_id',
            'supplier_id' => 'required|exists:suppliers,suppler_id',
            'base_price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'restock_point' => 'required|integer|min:0',
            'manufacturing_date' => 'nullable|date',
            'expiry_date' => 'nullable|date',
            'removal_date' => 'nullable|date'
        ]);

        // Handle image upload
        if ($request->hasFile('product_image')) {
            $image = $request->file('product_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/products'), $imageName);
            $data['product_image'] = 'uploads/products/' . $imageName;
        }

        try {
            $product = product::create($data);
            return redirect()->route('page.product-list')
                           ->with('success', 'Product created successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to create product: ' . $e->getMessage())
                        ->withInput();
        }
    }

    public function edit($sku)
    {
        try {
            Log::info('Edit product request received', [
                'sku' => $sku,
                'method' => request()->method(),
                'url' => request()->url()
            ]);
            
            $product = product::where('sku', $sku)->first();
            $categories = category::all(); 
            $suppliers = supplier::all(); 
            
            if (!$product) {
                Log::error('Product not found', ['sku' => $sku]);
                return redirect()->route('page.product-list')
                    ->with('error', 'Product not found with SKU: ' . $sku);
            }
            
            Log::info('Product found', [
                'sku' => $sku,
                'product_name' => $product->name,
                'product_data' => $product->toArray()
            ]);

            return view('page.edit-product', compact('product', 'categories', 'suppliers')); // Add categories here
        } catch (\Exception $e) {
            Log::error('Error in edit product', [
                'sku' => $sku,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return redirect()->route('page.product-list')
                ->with('error', 'Error loading product: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $sku) 
    {
        try {
            Log::info('Update product request received', [
                'sku' => $sku,
                'request_data' => $request->all()
            ]);

            $product = product::where('sku', $sku)->firstOrFail();
            
            $data = $request->validate([
                'sku' => 'required|string|unique:new_product,sku,' . $sku . ',sku',
                'name' => 'required|string|max:255',
                'product_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'category_id' => 'required|exists:categories,category_id',
                'supplier_id' => 'required|exists:suppliers,suppler_id',
                'base_price' => 'required|numeric|min:0',
                'quantity' => 'required|integer|min:0',
                'restock_point' => 'required|integer|min:0',
                'manufacturing_date' => 'nullable|date',
                'expiry_date' => 'nullable|date',
                'removal_date' => 'nullable|date'
            ], [
                'name.required' => 'Product name is required',
                'sku.required' => 'SKU is required',
                'sku.unique' => 'This SKU is already in use',
                'quantity.required' => 'Quantity is required',
                'quantity.min' => 'Quantity cannot be negative',
                'base_price.required' => 'Base price is required', 
                'base_price.min' => 'Base price cannot be negative',
                'category_id.required' => 'Please select a category',
                'category_id.exists' => 'Selected category is invalid',
                'supplier_id.required' => 'Please select a supplier',
                'supplier_id.exists' => 'Selected supplier is invalid',
                'product_image.image' => 'The file must be an image',
                'product_image.mimes' => 'Supported image formats are: jpeg, png, jpg, gif'
            ]);

            // Handle image upload
            if ($request->hasFile('product_image')) {
                // Delete old image if exists
                if ($product->product_image) {
                    Storage::delete($product->product_image);
                }
                
                $image = $request->file('product_image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $imagePath = $image->storeAs('products', $imageName, 'public');
                $data['product_image'] = 'storage/' . $imagePath;
            }

            // Convert checkbox values to boolean
            $booleanFields = ['is_fragile', 'is_biodegradable', 'is_frozen', 'in_stock'];
            foreach ($booleanFields as $field) {
                $data[$field] = $request->has($field);
            }

            Log::info('Updating product with data', [
                'sku' => $sku,
                'data' => $data
            ]);

            $product->update($data);

            Log::info('Product updated successfully', [
                'sku' => $sku,
                'updated_data' => $product->fresh()->toArray()
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Product updated successfully!'
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation errors:', $e->errors());
            return response()->json([
                'status' => 'error',
                'message' => 'The given data was invalid.',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            Log::error('Error updating product', [
                'sku' => $sku,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while updating the product: ' . $e->getMessage()
            ], 500);
        }
    }

    public function delete(Request $request)
    {
        $sku = $request->input('sku');
        $forceDelete = $request->input('force_delete', false);
        
        if ($forceDelete) {
            return $this->forceDelete($request);
        }
        
        try {
            $product = Product::where('sku', $sku)->first();
            
            if (!$product) {
                return redirect()->back()->with('error', 'Product not found');
            }
            
            // Delete product image if exists
            if ($product->product_image) {
                Storage::delete($product->product_image);
            }
            
            $product->delete();
            return redirect()->route('page.product-list')
                ->with('success', 'Product deleted successfully!');
        } catch (\Illuminate\Database\QueryException $e) {
            $sku = $request->input('sku');
            $product = Product::where('sku', $sku)->first();
            $productName = $product ? $product->name : 'Unknown Product';
            
            Log::error('Error deleting product:', ['sku' => $sku, 'message' => $e->getMessage()]);
            
            // Check if this is a foreign key constraint violation
            if ($e->errorInfo[1] == 1451) { // MySQL foreign key constraint error code
                // Extract table name from the error message
                $errorMsg = $e->getMessage();
                $relatedTables = [];
                $relatedRecords = [];
                
                // Try to parse the error message to extract table information
                // Example format: "a foreign key constraint fails (`database`.`table_name`, CONSTRAINT ..."
                if (preg_match('/`([^`]+)`\.`([^`]+)`/', $errorMsg, $matches) && isset($matches[2])) {
                    $tableName = $matches[2];
                    
                    // Map technical table names to user-friendly names
                    $tableMap = [
                        'orders' => 'Orders',
                        'order_items' => 'Order Items',
                        'invoices' => 'Invoices',
                        'invoice_items' => 'Invoice Items',
                        'cart_items' => 'Shopping Cart Items',
                        'wishlist_items' => 'Wishlist Items',
                        // Add more mappings as needed
                    ];
                    
                    $friendlyTableName = $tableMap[$tableName] ?? ucfirst(str_replace('_', ' ', $tableName));
                    $relatedTables[] = $friendlyTableName;
                    
                    // Try to get specific record information based on the table
                    try {
                        // Query to find the related records
                        $recordsData = [];
                        
                        switch ($tableName) {
                            case 'order_items':
                                // Get order items with order information
                                $records = DB::table('order_items')
                                    ->join('orders', 'order_items.order_id', '=', 'orders.id')
                                    ->where('order_items.product_sku', $sku)
                                    ->select('orders.id as order_id', 'orders.order_number', 'orders.created_at')
                                    ->get();
                                    
                                foreach ($records as $record) {
                                    $recordsData[] = [
                                        'id' => $record->order_id,
                                        'name' => "Order #{$record->order_number}",
                                        'date' => $record->created_at
                                    ];
                                }
                                break;
                                
                            case 'invoice_items':
                                // Get invoice items with invoice information
                                $records = DB::table('invoice_items')
                                    ->join('invoices', 'invoice_items.invoice_id', '=', 'invoices.id')
                                    ->where('invoice_items.product_sku', $sku)
                                    ->select('invoices.id as invoice_id', 'invoices.invoice_number', 'invoices.created_at')
                                    ->get();
                                    
                                foreach ($records as $record) {
                                    $recordsData[] = [
                                        'id' => $record->invoice_id,
                                        'name' => "Invoice #{$record->invoice_number}",
                                        'date' => $record->created_at
                                    ];
                                }
                                break;
                                
                            case 'cart_items':
                                // Get cart items with user information
                                $records = DB::table('cart_items')
                                    ->join('users', 'cart_items.user_id', '=', 'users.id')
                                    ->where('cart_items.product_sku', $sku)
                                    ->select('users.id as user_id', 'users.name as user_name', 'cart_items.created_at')
                                    ->get();
                                    
                                foreach ($records as $record) {
                                    $recordsData[] = [
                                        'id' => $record->user_id,
                                        'name' => "Cart of {$record->user_name}",
                                        'date' => $record->created_at
                                    ];
                                }
                                break;
                                
                            // Add more cases for other tables as needed
                            
                            default:
                                // Generic query for tables that might have a product_sku column
                                try {
                                    $records = DB::table($tableName)
                                        ->where('product_sku', $sku)
                                        ->orWhere('sku', $sku)
                                        ->select('id', 'created_at')
                                        ->limit(5)
                                        ->get();
                                        
                                    foreach ($records as $record) {
                                        $recordsData[] = [
                                            'id' => $record->id,
                                            'name' => "{$friendlyTableName} #{$record->id}",
                                            'date' => $record->created_at ?? 'N/A'
                                        ];
                                    }
                                } catch (\Exception $queryEx) {
                                    // Table structure doesn't match our assumption, just use generic info
                                    Log::info("Could not query table {$tableName}: " . $queryEx->getMessage());
                                }
                                break;
                        }
                        
                        // Add the records to our collection
                        if (!empty($recordsData)) {
                            $relatedRecords[$friendlyTableName] = $recordsData;
                        }
                        
                    } catch (\Exception $queryEx) {
                        Log::error("Error querying related records: " . $queryEx->getMessage());
                    }
                }
                
                // If we couldn't extract specific tables or there are multiple, give a generic message
                if (empty($relatedTables)) {
                    $relatedRecordsMsg = "orders, invoices, or other records";
                } else {
                    $relatedRecordsMsg = implode(', ', $relatedTables);
                }
                
                return redirect()->back()
                    ->with('error', 'Cannot delete product "' . $productName . '" because it is in use. Please remove all references to this product in ' . $relatedRecordsMsg . ' first.')
                    ->with('show_force_delete', true)
                    ->with('sku', $sku)
                    ->with('related_records', $relatedRecords);
            }
            
            return redirect()->back()->with('error', 'An error occurred while deleting the product: ' . $e->getMessage());
        } catch (\Exception $e) {
            $sku = $request->input('sku');
            Log::error('Error deleting product:', ['sku' => $sku, 'message' => $e->getMessage()]);
            return redirect()->back()->with('error', 'An error occurred while deleting the product: ' . $e->getMessage());
        }
    }
    
    /**
     * Force delete a product by bypassing foreign key constraints
     */
    public function forceDelete(Request $request)
    {
        $sku = $request->input('sku');
        
        try {
            $product = Product::where('sku', $sku)->first();
            
            if (!$product) {
                return redirect()->back()->with('error', 'Product not found');
            }
            
            $productName = $product->name;
            
            // Begin a transaction
            DB::beginTransaction();
            
            // Temporarily disable foreign key checks
            DB::statement('SET FOREIGN_KEY_CHECKS=0');
            
            // Delete product image if exists
            if ($product->product_image) {
                Storage::delete($product->product_image);
            }
            
            // Delete the product
            $product->delete();
            
            // Re-enable foreign key checks
            DB::statement('SET FOREIGN_KEY_CHECKS=1');
            
            // Commit the transaction
            DB::commit();
            
            Log::info('Product force deleted successfully', ['sku' => $sku, 'name' => $productName]);
            
            return redirect()->route('page.product-list')
                ->with('success', 'Product "' . $productName . '" was force deleted successfully. Note that related records may now be in an inconsistent state.');
                
        } catch (\Exception $e) {
            // Rollback on error
            DB::rollBack();
            
            // Make sure foreign keys are re-enabled even if there's an error
            DB::statement('SET FOREIGN_KEY_CHECKS=1');
            
            Log::error('Error force deleting product:', ['sku' => $sku, 'message' => $e->getMessage()]);
            return redirect()->back()->with('error', 'An error occurred while force deleting the product: ' . $e->getMessage());
        }
    }
}
