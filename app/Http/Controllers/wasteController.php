<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\waste;
use App\Models\product;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class wasteController extends Controller
{
    public function index()
    {
        $wastes = waste::with('product')->get();
        return view('page.waste-list', compact('wastes'));
    }

    public function create()
    {
        $products = product::all();
        return view('page.new-waste', compact('products'));
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'product_id' => 'required|exists:new_product,id',
                'quantity' => 'required|numeric|min:1',
                'reason' => 'required|string|max:255',
            ]);

            $waste = new waste();
            $waste->product_id = $validated['product_id'];
            $waste->quantity = $validated['quantity'];
            $waste->reason = $validated['reason'];
            $waste->date_added = now();
            $waste->save();

            if ($request->ajax()) {
                return response()->json([
                    'status' => true,
                    'message' => 'Waste record created successfully'
                ]);
            }

            return redirect()->route('page.waste-list')
                ->with('success', 'Waste record created successfully');

        } catch (\Exception $e) {
            Log::error('Error creating waste record: ' . $e->getMessage());
            
            if ($request->ajax()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Failed to create waste record'
                ], 500);
            }

            return redirect()->back()
                ->with('error', 'Failed to create waste record')
                ->withInput();
        }
    }

    public function edit($id)
    {
        try {
            $waste = waste::findOrFail($id);
            $products = product::all();
            return view('page.edit-waste', compact('waste', 'products'));
        } catch (\Exception $e) {
            Log::error('Error loading waste edit form: ' . $e->getMessage());
            return redirect()->route('page.waste-list')
                ->with('error', 'Error loading waste record');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'product_id' => 'required|exists:new_product,id',
                'quantity' => 'required|numeric|min:1',
                'reason' => 'required|string|max:255',
            ]);

            $waste = waste::findOrFail($id);
            $waste->product_id = $validated['product_id'];
            $waste->quantity = $validated['quantity'];
            $waste->reason = $validated['reason'];
            $waste->save();

            if ($request->ajax()) {
                return response()->json([
                    'status' => true,
                    'message' => 'Waste record updated successfully'
                ]);
            }

            return redirect()->route('page.waste-list')
                ->with('success', 'Waste record updated successfully');

        } catch (\Exception $e) {
            Log::error('Error updating waste record: ' . $e->getMessage());
            
            if ($request->ajax()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Failed to update waste record'
                ], 500);
            }

            return redirect()->back()
                ->with('error', 'Failed to update waste record')
                ->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $waste = waste::findOrFail($id);
            $waste->delete();

            if (request()->ajax()) {
                return response()->json([
                    'status' => true,
                    'message' => 'Waste record deleted successfully'
                ]);
            }

            return redirect()->route('page.waste-list')
                ->with('success', 'Waste record deleted successfully');

        } catch (\Exception $e) {
            Log::error('Error deleting waste record: ' . $e->getMessage());

            if (request()->ajax()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Failed to delete waste record'
                ], 500);
            }

            return redirect()->back()
                ->with('error', 'Failed to delete waste record');
        }
    }
}
