<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\positionModel;
use App\Models\Department;  // Add this line
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class PositionController extends Controller
{
    public function create()
    {
        $departments = Department::all();
        return view('page.new-position', compact('departments'));
    }

    public function update(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'position_id' => 'required|exists:position,position_id',
                'position_name' => 'required|string|max:255',
                'department_code' => 'required|exists:departments,department_code',
                'description' => 'required|string',
                'status' => 'boolean'
            ]);

            $position = positionModel::findOrFail($request->position_id);
            
            $position->update([
                'position_name' => $validatedData['position_name'],
                'department_code' => $validatedData['department_code'],
                'description' => $validatedData['description'],
                'status' => $request->has('status') ? 1 : 0
            ]);

            return redirect()->route('page.position-list')
                ->with('success', 'Position updated successfully!');
                
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation error:', ['errors' => $e->errors()]);
            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput();
        } catch (\Exception $e) {
            Log::error('Error updating position: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Error updating position: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function delete(Request $request) {
        try {
            $request->validate([
                'position_id' => 'required|exists:position,position_id',
            ]);

            $position = positionModel::where('position_id', $request->position_id)->first();
            
            if (!$position) {
                Log::error('Position not found for deletion', ['position_id' => $request->position_id]);
                return redirect()->back()->with('error', 'Position not found');
            }

            try {
                $position->delete();
                Log::info('Position deleted successfully', ['position_id' => $request->position_id]);
                
                if ($request->wantsJson()) {
                    return response()->json([
                        'status' => true,
                        'message' => 'Position deleted successfully'
                    ]);
                }
                
                return redirect()->route('page.position-list')->with('success', 'Position deleted successfully');

            } catch (\Exception $e) {
                Log::error('Error deleting position', [
                    'position_id' => $request->position_id,
                    'error' => $e->getMessage()
                ]);
                throw $e;
            }

        } catch (\Exception $e) {
            Log::error('Error in delete method', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            if ($request->wantsJson()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Failed to delete position: ' . $e->getMessage()
                ], 500);
            }

            return redirect()->back()->with('error', 'Failed to delete position: ' . $e->getMessage());
        }
    }

    public function getAll()
    {
        try {
            $positions = positionModel::all();
            return response()->json([
                'status' => true,
                'data' => $positions,
                'message' => 'Positions retrieved successfully'
            ]);
        } catch (\Exception $e) {
            Log::error('Error fetching positions: ' . $e->getMessage());
            return response()->json([
                'status' => false,
                'message' => 'Error fetching positions'
            ], 500);
        }
    }

    public function edit($id)
    {
        try {
            $position = positionModel::findOrFail($id);
            $departments = DB::table('departments')->get();
            
            return view('page.edit-position', compact('position', 'departments'));
        } catch (\Exception $e) {
            Log::error('Error editing position: ' . $e->getMessage());
            return redirect()->route('page.position-list')
                ->with('error', 'Position not found or error occurred');
        }
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'position_name' => 'required|string|max:255',
                'department_code' => 'required|exists:departments,department_code',
                'description' => 'required|string',
                'status' => 'sometimes' // Changed validation rule
            ]);

            \DB::beginTransaction();
            try {
                // Get the latest position_id
                $latestPosition = positionModel::orderBy('position_id', 'desc')->first();
                $nextPositionId = $latestPosition ? $latestPosition->position_id + 1 : 1;

                $position = positionModel::create([
                    'position_id' => $nextPositionId,
                    'position_name' => $validatedData['position_name'],
                    'department_code' => $validatedData['department_code'],
                    'description' => $validatedData['description'],
                    'status' => $request->has('status') ? 1 : 0 // This line remains the same
                ]);

                \DB::commit();

                return response()->json([
                    'status' => true,
                    'message' => 'Position created successfully',
                    'data' => $position
                ], 200);

            } catch (\Exception $e) {
                \DB::rollback();
                throw $e;
            }

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            Log::error('Error creating position: ' . $e->getMessage());
            return response()->json([
                'status' => false,
                'message' => 'Failed to create position: ' . $e->getMessage()
            ], 500);
        }
    }
}
