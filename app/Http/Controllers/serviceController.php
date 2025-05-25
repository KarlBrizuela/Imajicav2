<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\service;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\Models\branch;
use Symfony\Contracts\Service\Attribute\Required;

class serviceController extends Controller
{
   public function create(Request $request)
{
    // Force-set default values before validation
    $request->merge([
        'acq_pts' => $request->has('acq_pts') ? (int)$request->acq_pts : 0,
        'service_cost' => $request->service_cost ?? 0
    ]);

    $validated = $request->validate([
        'service_name' => 'required|string|max:255',
        'branch_code' => 'required|exists:branches,branch_code',
        'description' => 'required|string',
        'service_cost' => 'numeric|min:0',
        'acq_pts' => 'required|integer|min:0'
    ]);


    
    // Final safety check
    $validated['acq_pts'] = $validated['acq_pts'] ?? 0;

    try {
        $service = Service::create($validated);
        
        return response()->json([
            'status' => true,
            'message' => 'Service created successfully',
            'data' => $service
        ]);
        
    } catch (\Exception $e) {
        Log::error('Service creation failed', [
            'error' => $e->getMessage(),
            'data' => $validated
        ]);
        
        return response()->json([
            'status' => false,
            'message' => 'Service creation failed',
            'error' => $e->getMessage()
        ], 500);
    }
}

public function destroy($id)
{
    try {
        $service = Service::findOrFail($id);
        $service->delete();
        
        return redirect()->back()->with('success', 'Service deleted successfully!');
        
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Error deleting service: ' . $e->getMessage());
    }
}
public function update(Request $request) {
    // For debugging
    Log::info('Update service request method:', ['method' => $request->method()]);
    Log::info('Update service request data:', $request->all());

    // Validate the basic fields
    $validatedData = $request->validate([
        'service_id' => 'required|exists:services,service_id',
        'service_name' => 'required',
        'branch_code' => 'required',
        'description' => 'required',
        'service_cost' => 'nullable|numeric|min:0',
        'acq_pts' => 'nullable|integer|min:0',
    ]);

    try {
        // Find the service by ID
        $service = Service::findOrFail($validatedData['service_id']);

        // Update service details
        $service->service_name = $validatedData['service_name'];
        $service->branch_code = $validatedData['branch_code'];
        $service->description = $validatedData['description'];
        $service->service_cost = $validatedData['service_cost'] ?? 0;
        $service->acq_pts = $validatedData['acq_pts'] ?? 0;

        $service->save();

        return redirect()->route('page.services-list')->with('success', 'Service updated successfully');
    } catch (\Exception $e) {
        Log::error('Service update failed', [
            'error' => $e->getMessage(),
            'data' => $validatedData
        ]);
        
        return redirect()->back()->with('error', 'Failed to update service: ' . $e->getMessage());
    }
}

// In your controller


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


public function index()
{
    // Change from this:
    // $services = Service::all();
    
    // To this (newest first):
    $services = Service::orderBy('created_at', 'desc')->get();
    
    // Or if you want to order by the primary key (service_id) in descending order:
    // $services = Service::orderBy('service_id', 'desc')->get();
    
    return view('your-view-name', compact('services'));
}

public function store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'service_name' => 'required|string|max:255',
            'branch_code' => 'required|exists:branches,branch_code',
            'description' => 'nullable|string',
            'service_cost' => 'required|numeric|min:0', // Ensures cost is a positive number
        ]);

        // Create the service
        Service::create($validated);

        return redirect()->route('service.index')
            ->with('success', 'Service created successfully!');
    }

     public function getCost(Request $request)
{
    $serviceType = $request->input('service_type');
    $duration = $request->input('duration');
    
    // Calculate cost based on service type and duration
    $cost = $this->calculateServiceCost($serviceType, $duration);
    
    return response()->json(['cost' => $cost]);
}

}


