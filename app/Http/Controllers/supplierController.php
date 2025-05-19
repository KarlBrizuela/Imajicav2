<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\supplier;
use Illuminate\Support\Facades\Validator;

class supplierController extends Controller
{
    public function add_supplier(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'supplier_name' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'contact_person' => 'required|string|max:255',
            'address' => 'required|string',
            'mobile_number' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation Error',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Create new supplier
            $supplier = supplier::create([
                'supplier_name' => $request->supplier_name,
                'company' => $request->company,
                'contact_person' => $request->contact_person,
                'address' => $request->address,
                'mobile_number' => $request->mobile_number,
                'email' => $request->email,
                'description' => $request->description,
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Supplier created successfully',
                'data' => $supplier
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to create supplier',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function get_suppliers()
    {
        try {
            $suppliers = supplier::all();
            return response()->json([
                'status' => true,
                'data' => $suppliers
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to retrieve suppliers',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function get_supplier($id)
    {
        try {
            $supplier = supplier::find($id);
            
            if (!$supplier) {
                return response()->json([
                    'status' => false,
                    'message' => 'Supplier not found'
                ], 404);
            }

            return response()->json([
                'status' => true,
                'data' => $supplier
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to retrieve supplier',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function update_supplier(Request $request, $suppler_id) 
    {
        try {
            // Find the supplier first
            $supplier = supplier::findOrFail($suppler_id);

            // Validate the request data
            $validator = Validator::make($request->all(), [
                'supplier_name' => 'required|string|max:255',
                'company' => 'required|string|max:255',
                'contact_person' => 'required|string|max:255',
                'address' => 'required|string',
                'mobile_number' => 'required|string|max:20',
                'email' => 'required|email|max:255',
                'description' => 'nullable|string',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation Error',
                    'errors' => $validator->errors()
                ], 422);
            }

            // Update the supplier
            $supplier->update($request->only([
                'supplier_name',
                'company',
                'contact_person',
                'address',
                'mobile_number',
                'email',
                'description'
            ]));

            // Add session flash message
            session()->flash('success', 'Supplier updated successfully!');

            // Redirect to supplier list
            return response()->json([
                'status' => true,
                'message' => 'Supplier updated successfully',
                'data' => $supplier->fresh(),
                'redirect' => route('page.supplier-list') // This URL will be used by frontend to redirect
            ], 200);

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Supplier not found'
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to update supplier: ' . $e->getMessage()
            ], 500);
        }
    }

    public function delete_supplier($id)
    {
        try {
            $supplier = supplier::find($id);
            
            if (!$supplier) {
                return response()->json([
                    'status' => false,
                    'message' => 'Supplier not found'
                ], 404);
            }

            $supplier->delete();

            return response()->json([
                'status' => true,
                'message' => 'Supplier deleted successfully'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to delete supplier',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function edit($id)
    {
        try {
            $supplier = supplier::findOrFail($id);
            return view('page.edit-supplier', compact('supplier'));
        } catch (\Exception $e) {
            return redirect()->route('page.supplier-list')
                ->with('error', 'Failed to load supplier: ' . $e->getMessage());
        }
    }
}
