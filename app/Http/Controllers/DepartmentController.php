<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\Department;

class DepartmentController extends Controller
{
    public function index()
    {
        // Get all staff members for the department head dropdown
        $staff = Staff::all();
        
        // Get all departments for the parent department dropdown
        $departments = Department::all();
        
        return view('page.new-department', compact('staff', 'departments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'department_name' => 'required|string|max:255',
            'department_code' => 'required|string|max:50|unique:departments',
            'department_head' => 'required|string|max:255',
            'contact_email' => 'required|email|max:255',
            'description' => 'required|string'
        ]);

        try {
          
            
            // Create the department with the staff ID
            Department::create([
                'department_name' => $request->department_name,
                'department_code' => $request->department_code,
                'department_head' => $request->department_head,
                'description' => $request->description,
                'status' => 'active' // Default status
            ]);

            if ($request->ajax()) {
                return response()->json(['success' => true, 'message' => 'Department created successfully!']);
            }
            
            return redirect()->route('page.department-list')->with('success', 'Department created successfully!');
        } catch (\Exception $e) {
            if ($request->ajax()) {
                return response()->json(['success' => false, 'message' => 'Error creating department: ' . $e->getMessage()], 500);
            }
            
            return redirect()->back()->with('error', 'Error creating department: ' . $e->getMessage())->withInput();
        }
    }
    
    public function update(Request $request)
    {
        $request->validate([
            'department_code' => 'required|string|max:50',
            'department_name' => 'required|string|max:255',
            'description' => 'required|string'
        ]);

        try {
            $department = Department::where('department_code', $request->department_code)->first();
            
            if (!$department) {
                return redirect()->back()->with('error', 'Department not found!');
            }
            
            $department->update([
                'department_name' => $request->department_name,
                'description' => $request->description
                // We don't update the department_head field here because it's a foreign key
                // and changing it would require additional logic to handle the staff relationship
            ]);

            return redirect()->back()->with('success', 'Department updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error updating department: ' . $e->getMessage());
        }
    }
    
    public function delete(Request $request)
    {
        $request->validate([
            'department_code' => 'required|string|max:50'
        ]);

        try {
            $department = Department::where('department_code', $request->department_code)->first();
            
            if (!$department) {
                return redirect()->back()->with('error', 'Department not found!');
            }
            
            $department->delete();

            return redirect()->back()->with('success', 'Department deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error deleting department: ' . $e->getMessage());
        }
    }
    
    public function getAllDepartments()
    {
        try {
            $departments = Department::all();
            return response()->json(['success' => true, 'data' => $departments]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function edit($department_code)
    {
        $department = Department::where('department_code', $department_code)->firstOrFail();
        return view('page.edit-department', compact('department'));
    }
}