<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\branch;
use App\Models\service;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PackageController extends Controller
{
    /**
     * Display the packages page.
     *
     * @return \Illuminate\Http\Response
     */

     
    public function index()
    {
        $packages = Package::with(['branch'])->get();
        $branches = branch::all();
        $services = service::all();

        return view('page.packages-list', compact('packages', 'branches', 'services'));
    }

    // In your PackageController.php
public function getCost(Request $request)
{
    $packageIds = $request->input('package_ids');
    
    // Calculate total cost (example logic)
    $totalCost = Package::whereIn('package_id', $packageIds)->sum('price');
    
    return response()->json([
        'success' => true,
        'total_cost' => $totalCost,
        'price' => $request->price,
    ]);
}


     public function get_cost(Request $request)

    {
        $packageId = $request->input('package_id');
        $quantity = $request->input('quantity', 1);
        
        // Logic to calculate package cost
        // Example: fetch package from database and calculate total
        $package = Package::find($packageId);
        $cost = $package ? $package->price * $quantity : 0;
        
        return response()->json([
            'cost' => $cost,
            'package' => $package
        ]);
    }
    /**
     * Display the package creation page.
     *
     * @return \Illuminate\Http\Response
     */
    public function showCreateForm()
    {
        $branches = branch::all();
        $services = service::all();

        return view('page.new-package', compact('branches', 'services'));
    }

     

    /**
     * Store a newly created package in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try {
            // Log incoming request data
            Log::info('Package creation request data:', $request->all());
            
            // Validate request data
            $validatedData = $request->validate([
                'package_name' => 'required|string|max:255',
                'branch_code' => 'required|exists:branches,branch_code',
                'description' => 'nullable|string',
                'inclusions' => 'required|array',
                'inclusions.*' => 'exists:services,service_id',
                'free' => 'nullable|string|max:255',
                'free' => 'nullable|string|max:255',
            ]);
            
            Log::info('Validated data:', $validatedData);

            // Create the package with empty array for inclusions
            $package = Package::create([
                'package_name' => $validatedData['package_name'],
                'branch_code' => $validatedData['branch_code'],
                'description' => $validatedData['description'],
                'inclusions' => [], // Add empty array for inclusions
                'free' => $validatedData['free'],
                'price' => $request->price,
            ]);
            
            Log::info('Package created:', ['id' => $package->package_id]);

            // Attach services to the package
            if (isset($validatedData['inclusions']) && !empty($validatedData['inclusions'])) {
                try {
                    $package->services()->attach($validatedData['inclusions']);
                    Log::info('Services attached to package', ['services' => $validatedData['inclusions']]);
                } catch (\Exception $e) {
                    Log::error('Error attaching services: ' . $e->getMessage());
                    Log::error('Stack trace: ' . $e->getTraceAsString());
                    // Continue execution even if service attachment fails
                }
            } else {
                Log::warning('No inclusions were provided to attach to the package');
            }

            // Explicitly check if request wants JSON
            if ($request->expectsJson() || $request->ajax()) {
                $response = [
                    'status' => true,
                    'message' => 'Package created successfully',
                    'package' => $package->load('services')->toArray()
                ];
                
                Log::info('JSON response:', $response);
                return response()->json($response);
            }

            return redirect()->route('page.packages-list')
                ->with('success', 'Package created successfully');
                
        } catch (\Exception $e) {
            Log::error('Error creating package: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());
            
            if ($request->wantsJson()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Error creating package: ' . $e->getMessage()
                ], 500);
            }
            
            return redirect()->back()
                ->with('error', 'Error creating package: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Show the form for editing the specified package.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $package = Package::with('services')->findOrFail($id);
        $branches = branch::all();
        $services = service::all();

        return view('page.edit-package', compact('package', 'branches', 'services'));
    }

    /**
     * Update the specified package in storage.
     
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  // In Package model
public function services()
{
    return $this->belongsToMany(Service::class, 'package_service', 'package_id', 'service_id');
}

    /**
     * Remove the specified package from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        try {
            // Log incoming request data
            Log::info('Package deletion request received:', [
                'request_data' => $request->all(),
                'headers' => $request->headers->all()
            ]);
            
            // Get and decode JSON data if content-type is application/json
            $data = $request->isJson() ? $request->json()->all() : $request->all();
            
            // Validate package ID
            $validatedData = validator($data, [
                'package_id' => 'required|exists:packages,package_id'
            ])->validate();

            Log::info('Package ID validated:', [
                'package_id' => $validatedData['package_id']
            ]);

            // Find the package with its relationships
            $package = Package::with(['services'])->findOrFail($validatedData['package_id']);
            Log::info('Package found:', [
                'package_data' => $package->toArray()
            ]);
            
            try {
                // First detach all services
                $package->services()->detach();
                Log::info('Services detached from package');
            } catch (\Exception $e) {
                Log::error('Error detaching services:', [
                    'error' => $e->getMessage(),
                    'trace' => $e->getTraceAsString()
                ]);
                throw $e;
            }
            
            try {
                // Then delete the package
                $deleted = $package->delete();
                Log::info('Package delete operation result:', ['deleted' => $deleted]);
            } catch (\Exception $e) {
                Log::error('Error deleting package:', [
                    'error' => $e->getMessage(),
                    'trace' => $e->getTraceAsString()
                ]);
                throw $e;
            }

            return response()->json([
                'status' => true,
                'message' => 'Package deleted successfully'
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation error in delete method:', [
                'errors' => $e->errors(),
                'request_data' => $request->all()
            ]);
            
            return response()->json([
                'status' => false,
                'message' => 'The given data was invalid.',
                'errors' => $e->errors()
            ], 422);
            
        } catch (\Exception $e) {
            Log::error('Error in delete method:', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'request_data' => $request->all()
            ]);
            
            return response()->json([
                'status' => false,
                'message' => 'Error deleting package: ' . $e->getMessage()
            ], 500);
        }
    }

   public function update(Request $request)
{
    Log::debug('Package Update - Form Data Received:', $request->all());
    
    try {
        // Log the incoming request data
        Log::info('Attempting to update package with data:', [
            'request_data' => $request->all()
        ]);
        
        // Validate request data
        $validated = $request->validate([
            'package_id' => 'required|exists:packages,package_id',
            'package_name' => 'required|string|max:255',
            'branch_code' => 'required|exists:branches,branch_code',
            'description' => 'nullable|string',
            'inclusions' => 'required|array',
            'inclusions.*' => 'exists:services,service_id',
            'free' => 'nullable|string|max:255',
            'price' => 'required|numeric|min:0'
        ]);

        Log::info('Validation passed. Validated data:', [
            'validated_data' => $validated
        ]);

        // Find the package
        $package = Package::findOrFail($validated['package_id']);
        Log::info('Found package:', [
            'package_id' => $package->package_id,
            'current_data' => $package->toArray()
        ]);

        // Update package
        $package->update([
            'package_name' => $validated['package_name'],
            'branch_code' => $validated['branch_code'],
            'description' => $validated['description'],
            'free' => $validated['free'],
            'price' => $validated['price']
        ]);

        Log::info('Package basic info updated');

        // Sync services (convert to integers first)
        $serviceIds = array_map('intval', $validated['inclusions']);
        Log::info('Syncing services:', ['service_ids' => $serviceIds]);
        
        $package->services()->sync($serviceIds);
        Log::info('Services synced successfully');

        return response()->json([
            'success' => true,
            'message' => 'Package updated successfully',
            'redirect' => route('page.packages-list')
        ]);

    } catch (\Illuminate\Validation\ValidationException $e) {
        Log::error('Package update validation failed:', [
            'errors' => $e->errors(),
            'request_data' => $request->all()
        ]);
        
        return response()->json([
            'success' => false,
            'message' => 'Validation error',
            'errors' => $e->errors()
        ], 422);
    } catch (\Exception $e) {
        Log::error('Package update failed:', [
            'error' => $e->getMessage(),
            'trace' => $e->getTraceAsString(),
            'request_data' => $request->all()
        ]);
        
        return response()->json([
            'success' => false,
            'message' => 'Error updating package: ' . $e->getMessage(),
            'error' => $e->getMessage()
        ], 500);
    }
}
    /**
     * Get the total price of all services in a package
     *
     * @param int $packageId
     * @return \Illuminate\Http\JsonResponse
     */
    public function getPackagePrice($packageId)
    {
        try {
            $package = Package::with('services')->findOrFail($packageId);
            
            // Calculate total price from all services in the package
            $totalPrice = $package->services->sum('service_cost');
            
            return response()->json([
                'status' => true,
                'package_id' => $packageId,
                'package_name' => $package->package_name,
                'total_price' => $totalPrice,
                'service_count' => $package->services->count()
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Error retrieving package price: ' . $e->getMessage()
            ], 404);
        }
    }
}
