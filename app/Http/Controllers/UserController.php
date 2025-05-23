<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\staff;
use App\Models\branch;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function create(Request $request)
{
    try {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'user_type' => 'required|in:admin,staff',
            'branch' => 'required|exists:branches,branch_code'
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
             'plain' => $validated['password'],
            'user_type' => $validated['user_type'],
            'branch_id' => $validated['branch']
        ]);

        return response()->json([
            'status' => true,
            'message' => 'User created successfully',
            'data' => $user
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'status' => false,
            'message' => $e->getMessage()
        ], 500);
    }
}

    public function edit($id)
    {
        try {
            $user = User::where('id', $id)->first();
            
            if (!$user) {
                return redirect()->route('page.user-list')
                    ->with('error', 'User not found');
            }

            $branches = Branch::all();
            $staffs =   staff::all();
            
            // Return the edit view with the branch data
            return view('page.edit-user', compact('user','branches','staffs'));
        } catch (\Exception $e) {
            return redirect()->route('page.user-list')
                ->with('error', 'Error occurred while editing branch: ' . $e->getMessage());
        }
    }

   public function createForm()
{
    $branches = Branch::all();
    $staffs = Staff::all(); // Make sure this line exists
    
    // Debug output (temporary)
    logger($staffs); // Check storage/logs/laravel.log
    dd($staffs); // Or use this to see output immediately
    
    return view('page.new-user', compact('branches', 'staffs'));
}

    public function update(Request $request)
    {
        try {
            // Validate input
            $validated = $request->validate([
                'name' => 'required',
                'email' => 'required',
                'user_type' => 'required'
            ]);

            // Create User
            if($validated){
                $user = User::findOrFail($request->user_id);
                $user->branch_id = $request->branch;
                $user->name = $request->name;
                $user->email = $request->email;
                if(!empty($request->password)){
                    $user->password = bcrypt($request->password);
                    $user->plain = $request->password;
                }
                $user->user_type = $request->user_type;
                $user->save();
            }

            if(!empty($request->staff)){
                $staff = staff::findOrFail($request->staff);
                $staff->user_id = $user->id;
                $staff->save();
            }

            return response()->json([
                'status' => true,
                'message' => 'User updated successfully'
            ]);

        } catch (\Illuminate\Database\QueryException $e) {
            // Check for duplicate entry error (MySQL error code 1062)
            if ($e->errorInfo[1] == 1062) {
                return response()->json([
                    'status' => false,
                    'message' => 'Email already registered'
                ], 422);
            }

            return response()->json([
                'status' => false,
                'message' => 'Database error occurred'
            ], 500);
        }
    }

    public function delete($id)
    {
        $user = User::find($id);

        if ($user) {

            if($user->delete()){
                $staff = staff::where('user_id', $id)->first();
                if($staff){
                    $staff->user_id = NULL;
                    $staff->save();
                }
            }
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }
}
