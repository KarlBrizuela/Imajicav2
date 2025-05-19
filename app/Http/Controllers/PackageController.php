<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\branch;
use App\Models\service;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

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
            ]);
            
            Log::info('Validated data:', $validatedData);

            // Create the package with empty array for inclusions
            $package = Package::create([
                'package_name' => $validatedData['package_name'],
                'branch_code' => $validatedData['branch_code'],
                'description' => $validatedData['description'],
                'inclusions' => [], // Add empty array for inclusions
                'free' => $validatedData['free'],
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
    public function update(Request $request)
    {
        try {
            // Validate request data
            $validatedData = $request->validate([
                'package_id' => 'required|exists:packages,package_id',
                'package_name' => 'required|string|max:255',
                'branch_code' => 'required|exists:branches,branch_code',
                'description' => 'nullable|string',
                'inclusions' => 'required|array',
                'inclusions.*' => 'exists:services,service_id',
                'free' => 'nullable|string|max:255',
            ]);

            Log::info('Update package validatedData:', $validatedData);
            $package = Package::findOrFail($validatedData['package_id']);

            // Update the package with inclusions field
            $package->update([
                'package_name' => $validatedData['package_name'],
                'branch_code' => $validatedData['branch_code'],
                'description' => $validatedData['description'],
                'inclusions' => $validatedData['inclusions'], // Keep inclusions field
                'free' => $validatedData['free'],
            ]);

            // Sync services
            if (isset($validatedData['inclusions']) && !empty($validatedData['inclusions'])) {
                try {
                    $package->services()->sync($validatedData['inclusions']);
                    Log::info('Services synced with package', ['services' => $validatedData['inclusions']]);
                } catch (\Exception $e) {
                    Log::error('Error syncing services: ' . $e->getMessage());
                    Log::error('Stack trace: ' . $e->getTraceAsString());
                }
            } else {
                Log::warning('No inclusions were provided to sync with the package');
                $package->services()->detach();
            }

            if ($request->wantsJson()) {
                return response()->json([
                    'status' => true,
                    'message' => 'Package updated successfully',
                    'package' => $package->load('services')
                ]);
            }

            return redirect()->route('page.packages-list')
                ->with('success', 'Package updated successfully');
        } catch (\Exception $e) {
            Log::error('Error updating package: ' . $e->getMessage());
            
            if ($request->wantsJson()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Error updating package: ' . $e->getMessage()
                ], 500);
            }
            
            return redirect()->back()
                ->with('error', 'Error updating package: ' . $e->getMessage())
                ->withInput();
        }
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
            // Validate package ID
            $validatedData = $request->validate([
                'package_id' => 'required|exists:packages,package_id'
            ]);

            $package = Package::findOrFail($validatedData['package_id']);
            
            // Delete the package (this will also delete the related pivot records due to onDelete('cascade'))
            $package->delete();

            if ($request->wantsJson()) {
                return response()->json([
                    'status' => true,
                    'message' => 'Package deleted successfully'
                ]);
            }

            return redirect()->route('page.packages-list')
                ->with('success', 'Package deleted successfully');
        } catch (\Exception $e) {
            Log::error('Error deleting package: ' . $e->getMessage());
            
            if ($request->wantsJson()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Error deleting package: ' . $e->getMessage()
                ], 500);
            }

            return redirect()->back()
                ->with('error', 'Error deleting package: ' . $e->getMessage());
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
