<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\staff;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class staffController extends Controller
{
    //create
    public function create(Request $request)
    {
        try {
            // Log the raw request data for debugging
            Log::info('Staff creation request data', [
                'all_data' => $request->all(),
                'file' => $request->hasFile('image_path') ? 'Image file present' : 'No image file'
            ]);
            
            // Validate the form data with less strict requirements
            $data = $request->validate([
                'image_path' => 'nullable',
                'firstname' => 'required|string|max:255',
                'lastname' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'contact_number' => 'required|string|max:20',
                'position_id' => 'required|exists:position,position_id',
                'department_code' => 'required|exists:departments,department_code',
                'join_date' => 'required|date',
                'employment_type' => 'required|string|max:255',
                'branch_code' => 'required|exists:branches,branch_code',
                'address' => 'required|string',
                'emergency_contact_name' => 'nullable|string|max:255',
                'emergency_contact_number' => 'nullable|string|max:20',
            ]);

            // Initialize data array without the image_path
            $staffData = $request->except('image_path', '_token', '_method');
            
            // Handle image upload if present
            if ($request->hasFile('image_path')) {
                $image = $request->file('image_path');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('staff'), $imageName);
                $staffData['image_path'] = 'staff/' . $imageName;
            }
            
            // Create the staff record
            $newStaff = staff::create($staffData);
            
            // Log success for debugging
            Log::info('Staff created successfully', ['staff_id' => $newStaff->id]);
            
            return redirect()->route('page.new-staff')->with('success', 'Staff added successfully!');
        } catch (ValidationException $e) {
            // For validation errors, get the detailed error messages
            $errors = $e->validator->errors()->all();
            $errorMsg = implode(', ', $errors);
            
            Log::error('Validation error when creating staff', [
                'errors' => $errors,
                'data' => $request->all()
            ]);
            
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput()
                ->with('error', 'Validation error: ' . $errorMsg);
        } catch (\Exception $e) {
            // For other errors
            Log::error('Error creating staff', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'data' => $request->all()
            ]);
            
            return redirect()->back()
                ->withInput()
                ->with('error', 'Error creating staff: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        try {
            $staff = Staff::findOrFail($id);
            $positions = \App\Models\positionModel::all();
            $branches = \App\Models\branch::all();
            $departments = \App\Models\Department::all();
            return view('page.edit-staff', compact('staff', 'positions', 'branches', 'departments'));
        } catch (\Exception $e) {
            Log::error('Error loading staff edit form', [
                'staff_id' => $id,
                'error' => $e->getMessage()
            ]);
            
            return redirect()->route('page.staff-list')
                ->with('error', 'Error loading staff edit form: ' . $e->getMessage());
        }
    }

    public function update(Request $request)
    {
        try {
            $id = $request->input('staff_id');
            $staff = Staff::findOrFail($id);
            
            // Validate the form data
            $data = $request->validate([
                'firstname' => 'required|string|max:255',
                'lastname' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'contact_number' => 'required|string|max:20',
                'position_id' => 'required|exists:position,position_id',
                'branch_code' => 'required|exists:branches,branch_code', 
                'address' => 'required|string',
                'emergency_contact_name' => 'nullable|string|max:255',
                'emergency_contact_number' => 'nullable|string|max:20',
            ]);

            // Handle image upload if present 
            if ($request->hasFile('image_path')) {
                $image = $request->file('image_path');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('staff'), $imageName);
                $data['image_path'] = 'staff/' . $imageName;
            }

            $staff->update($data);
            
            return redirect()->route('page.staff-list')
                ->with('success', 'Staff updated successfully');
        } catch (\Exception $e) {
            Log::error('Error updating staff', [
                'staff_id' => $id,
                'error' => $e->getMessage()
            ]);
            
            return redirect()->back()
                ->withInput()
                ->with('error', 'Error updating staff: ' . $e->getMessage());
        }
    }

    /**
     * Delete a staff member
     */
    public function delete($id)
    {
        try {
            $staff = Staff::findOrFail($id);
            $staffName = $staff->firstname . ' ' . $staff->lastname;
            
            // Delete the staff
            $staff->delete();
            
            // Log the deletion
            Log::info('Staff deleted successfully', ['staff_id' => $id, 'staff_name' => $staffName]);
            
            return redirect()->route('page.staff-list')->with('success', 'Staff deleted successfully');
        } catch (\Exception $e) {
            Log::error('Error deleting staff', [
                'staff_id' => $id,
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return redirect()->back()->with('error', 'Error deleting staff: ' . $e->getMessage());
        }
    }
}
