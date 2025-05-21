<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\service;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\Models\branch;


class serviceController extends Controller
{
   public function create(Request $request) {
        try {
            $data = $request->validate([
                'service_name' => 'required',
                'branch_code' => 'required',
                'description' => 'required',
                'service_cost',

            ]);



            $service = service::create($data);

            if ($request->ajax()) {
                return response()->json([
                    'status' => true,
                    'message' => 'Service created successfully',
                    'data' => $service
                ]);
            }

            return redirect()->route('page.services-list')->with('success', 'Service created successfully');

        } catch (\Exception $e) {
            if ($request->ajax()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Failed to create service: ' . $e->getMessage()
                ], 500);
            }
            return redirect()->back()->with('error', 'Failed to create service: ' . $e->getMessage());
        }
    }

public function update(Request $request) {
    // For debugging
    Log::info('Update service request method:', ['method' => $request->method()]);
    Log::info('Update service request data:', $request->all());

    // Validate the basic fields
    $validatedData = $request->validate([
        'service_name' => 'required',
        'branch_code' => 'required',
        'description' => 'required',
        'service_cost',
    ]);

    // Find the service by ID
    $service = service::find($request->input('service_id'));
    if (!$service) {
        return redirect()->back()->with('error', 'Service not found');
    }



    // Update service details
    $service->service_name = $request->service_name;
    $service->branch_code = $request->branch_code;
    $service->description = $request->description;
    $service->service_cost = $request->service_cost;

    $service->save();

    return redirect()->route('page.services-list')->with('success', 'Service updated successfully');
}


public function delete(Request $request)
{
    // Validate the request
    $request->validate([
        'id' => 'required',
    ]);

    // Find the service by service_id
    $service = service::where('service_id', $request->id)->first();

    if (!$service) {
        if ($request->ajax()) {
            return response()->json([
                'success' => false,
                'message' => 'Service not found'
            ], 404);
        }
        return redirect()->back()->with('error', 'Service not found');
    }

    // Delete the service
    $service->delete();

    // If it's an AJAX request, return a JSON response
    if ($request->ajax()) {
        return response()->json([
            'success' => true,
            'message' => 'Service deleted successfully'
        ]);
    }

    // For non-AJAX requests, redirect back with success message
    return redirect()->back()->with('success', 'Service deleted successfully');
}



    public function getServices()
    {
        $services = service::with('branch')->get();
        return view('page.services-list', compact('services'));
    }

 public function edit($service_id)
{
    // Get the service by service_id
    $service = service::findOrFail($service_id);

    // Get all branches for the branch select dropdown
    $branches = branch::all();

    // Return the edit view with service data
    return view('page.edit-service', compact('service', 'branches'));
}

}
