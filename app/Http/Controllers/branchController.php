<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\branch;
use Illuminate\Support\Facades\Validator;

class branchController extends Controller
{
    public function create(Request $request)
    {
        try {
            // Validate input
            $validated = $request->validate([
                'branch_code' => 'required|unique:branches,branch_code',
                'branch_name' => 'required',
                'address' => 'required'
            ]);

            // Create branch
            $branch = Branch::create($validated);

            return response()->json([
                'status' => true,
                'message' => 'Branch created successfully'
            ]);

        } catch (\Illuminate\Database\QueryException $e) {
            // Check for duplicate entry error (MySQL error code 1062)
            if ($e->errorInfo[1] == 1062) {
                return response()->json([
                    'status' => false,
                    'message' => 'Branch code already exists'
                ], 422);
            }

            return response()->json([
                'status' => false,
                'message' => 'Database error occurred'
            ], 500);
        }
    }

    public function update(Request $request)
    {
        // Validate the request
        $request->validate([
            'branch_code' => 'required',
            'branch_name' => 'required',
            'address' => 'required',
        ]);

        // Find the branch by branch_code
        $branch = Branch::where('branch_code', $request->branch_code)->first();
        
         if (!$branch) {
            return redirect()->back()->with('error', 'Branch not found');
        }

        // Update the branch
        $branch->branch_name = $request->branch_name;
        $branch->address = $request->address;
        $branch->save();

        // Redirect to branch list with success message
        return redirect()->route('page.branch-list')->with('success', 'Branch updated successfully');
    }

    public function delete(Request $request)
    {
        // Validate the request
        $request->validate([
            'branch_code' => 'required',
        ]);

        // Find the branch by branch_code
        $branch = Branch::where('branch_code', $request->branch_code)->first();
        
        if (!$branch) {
            return redirect()->back()->with('error', 'Branch not found');
        }

        // Delete the branch
        $branch->delete();

        return redirect()->back()->with('success', 'Branch deleted successfully');
    
    }

    public function getAllBranches()
    {
        try {
            $branches = Branch::all();
            return response()->json([
                'status' => true,
                'data' => $branches,
                'message' => 'Branches retrieved successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to retrieve branches: ' . $e->getMessage()
            ], 500);
        }
    }

    public function edit($branch_code)
    {
        try {
            // Find the branch by branch_code
            $branch = Branch::where('branch_code', $branch_code)->first();
            
            if (!$branch) {
                return redirect()->route('page.branch-list')
                    ->with('error', 'Branch not found with code: ' . $branch_code);
            }
            
            // Return the edit view with the branch data
            return view('page.edit-branch', compact('branch'));
        } catch (\Exception $e) {
            return redirect()->route('page.branch-list')
                ->with('error', 'Error occurred while editing branch: ' . $e->getMessage());
        }
    }
}