<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\coupon;
use App\Models\branch;
use App\Models\service; // Add this
use Illuminate\Support\Facades\Log;

class CouponController extends Controller
{
    public function create(Request $request)
    {
        try {
            // Log the received data
            Log::info('Received coupon data:', $request->all());

            $data = $request->validate([
                'coupon_code' => 'required|unique:coupons',
                'discount_name' => 'required|min:3',  // matches form field
                'description' => 'required',
                'discount_type' => 'required|in:fixed,percentage',  // matches new select options
                'discount_value' => 'required|numeric|min:0',
                'service_id' => 'required',  // matches form field name
                'start_end_date' => 'required',
                'new_customer' => 'required|in:Yes,No',
                'branch_code' => 'required|exists:branches,branch_code'
            ], [
                'coupon_code.unique' => 'This coupon code already exists',
                'coupon_code.required' => 'Coupon code is required',
                'coupon_name.required' => 'Coupon name is required',
                'coupon_name.min' => 'Coupon name must be at least 3 characters',
                'description.required' => 'Description is required',
                'discount_type.required' => 'Please select a discount type',
                'discount_value.required' => 'Discount value is required',
                'discount_value.numeric' => 'Discount value must be a number',
                'service_id.required' => 'Please select at least one service',
                'start_end_date.required' => 'Please select start and end dates',
                'branch_code.required' => 'Please select a branch',
                'branch_code.exists' => 'Selected branch is invalid'
            ]);

            // Log if validation passes
            Log::info('Validation passed');
            
            $newCoupon = coupon::create($data);
            
            return redirect()->route('page.coupon-list')
                ->with('success', 'Coupon created successfully!');

        } catch (\Illuminate\Validation\ValidationException $e) {
            // Log validation errors
            Log::error('Validation errors:', $e->errors());
            throw $e;
        } catch (\Exception $e) {
            Log::error('Other error:', ['message' => $e->getMessage()]);
            return back()
                ->withErrors(['error' => 'An error occurred while creating the coupon: ' . $e->getMessage()])
                ->withInput();
        }
    }

    public function update(Request $request) 
    {
        try {
            // Log the received data
            Log::info('Received coupon data:', $request->all());

            $data = $request->validate([
                'coupon_code' => 'required',
                'discount_name' => 'required|min:3',  // matches form field
                'description' => 'required',
                'discount_type' => 'required|in:fixed,percentage',  // matches new select options
                'discount_value' => 'required|numeric|min:0',
                'service_id' => 'required',  // matches form field name
                'start_end_date' => 'required',
                'new_customer' => 'required|in:Yes,No',
                'branch_code' => 'required|exists:branches,branch_code'
            ], [
                'coupon_code.required' => 'Coupon code is required',
                'coupon_name.required' => 'Coupon name is required',
                'coupon_name.min' => 'Coupon name must be at least 3 characters',
                'description.required' => 'Description is required',
                'discount_type.required' => 'Please select a discount type',
                'discount_value.required' => 'Discount value is required',
                'discount_value.numeric' => 'Discount value must be a number',
                'service_id.required' => 'Please select at least one service',
                'start_end_date.required' => 'Please select start and end dates',
                'branch_code.required' => 'Please select a branch',
                'branch_code.exists' => 'Selected branch is invalid'
            ]);

            // Log if validation passes
            Log::info('Validation passed');
            
            $coupon = coupon::where('coupon_code', $request->coupon_code)->first();
            
            if (!$coupon) {
                return redirect()->back()->with('error', 'Coupon not found');
            }

            $coupon->discount_name = $request->discount_name;
            $coupon->description = $request->description;
            $coupon->discount_type = $request->discount_type;
            $coupon->discount_value = $request->discount_value;
            $coupon->service_id = $request->service_id;
            $coupon->start_end_date = $request->start_end_date;
            $coupon->new_customer = $request->new_customer;
            $coupon->branch_code = $request->branch_code;
            $coupon->save();

            return redirect()->route('page.coupon-list')
                ->with('success', 'Coupon updated successfully!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Log validation errors
            Log::error('Validation errors:', $e->errors());
            throw $e;
        } catch (\Exception $e) {
            Log::error('Other error:', ['message' => $e->getMessage()]);
            return back()
                ->withErrors(['error' => 'An error occurred while updating the coupon: ' . $e->getMessage()])
                ->withInput();
        }
    }
    
    public function getBranch()
    {
        $branches = branch::all();
        $services = service::all(); // Get all services
        return view('page.coupon_list', compact('branches', 'services'));
    }
    
    // Add the missing get method to fetch a coupon's details
    public function get(Request $request)
    {
        try {
            $couponCode = $request->input('coupon_code');
            $coupon = coupon::where('coupon_code', $couponCode)->first();
            
            if (!$coupon) {
                return response()->json(['error' => 'Coupon not found'], 404);
            }
            
            return response()->json($coupon);
        } catch (\Exception $e) {
            Log::error('Error fetching coupon:', ['message' => $e->getMessage()]);
            return response()->json(['error' => 'Failed to fetch coupon details'], 500);
        }
    }
    
    // Add the missing delete method
    public function delete(Request $request)
    {
        try {
            $couponCode = $request->input('coupon_code');
            $coupon = coupon::where('coupon_code', $couponCode)->first();
            
            if (!$coupon) {
                return redirect()->back()->with('error', 'Coupon not found');
            }
            
            $coupon->delete();
            return redirect()->route('page.coupon-list')
                ->with('success', 'Coupon deleted successfully!');
        } catch (\Exception $e) {
            Log::error('Error deleting coupon:', ['message' => $e->getMessage()]);
            return redirect()->back()->with('error', 'An error occurred while deleting the coupon: ' . $e->getMessage());
        }
    }

    public function edit($coupon_code)
    {
        try {
            Log::info('Attempting to find coupon for editing', ['coupon_code' => $coupon_code]);
            
            $coupon = coupon::where('coupon_code', $coupon_code)->first();
            
            if (!$coupon) {
                Log::warning('Coupon not found for editing', ['coupon_code' => $coupon_code]);
                return redirect()->route('page.coupon-list')
                    ->with('error', 'Coupon not found with code: ' . $coupon_code);
            }
            
            $branches = branch::all();
            $services = service::all();
            
            Log::info('Successfully found coupon for editing', [
                'coupon_code' => $coupon_code, 
                'name' => $coupon->discount_name
            ]);
            
            return view('page.edit-coupon', compact('coupon', 'branches', 'services'));
        } catch (\Exception $e) {
            Log::error('Error finding coupon for editing', [
                'coupon_code' => $coupon_code,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return redirect()->route('page.coupon-list')
                ->with('error', 'Error occurred while editing coupon: ' . $e->getMessage());
        }
    }

    /**
     * Verify a coupon code via AJAX request
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function verify(Request $request)
    {
        $couponCode = $request->input('coupon_code');
        $serviceId = $request->input('service_id');
        
        // Find the coupon
        $coupon = \App\Models\coupon::where('coupon_code', $couponCode)->first();
        
        if (!$coupon) {
            return response()->json([
                'valid' => false,
                'message' => 'Coupon code not found'
            ]);
        }
        
        // Check if the coupon has start/end date constraints
        if ($coupon->start_end_date) {
            $dates = explode(' - ', $coupon->start_end_date);
            if (count($dates) === 2) {
                $startDate = \Carbon\Carbon::parse($dates[0]);
                $endDate = \Carbon\Carbon::parse($dates[1]);
                $currentDate = \Carbon\Carbon::now();
                
                if ($currentDate->lt($startDate) || $currentDate->gt($endDate)) {
                    return response()->json([
                        'valid' => false,
                        'message' => 'Coupon is not valid during this period'
                    ]);
                }
            }
        }
        
        // Check if coupon is service-specific and matches the requested service
        if ($coupon->service_id && $coupon->service_id != $serviceId) {
            // Get service name for error message
            $service = service::find($coupon->service_id);
            $serviceName = $service ? $service->service_name : 'specific services';
            
            return response()->json([
                'valid' => false,
                'message' => "This coupon is only valid for {$serviceName}"
            ]);
        }
        
        // Check if coupon is restricted to new customers only
        if ($coupon->new_customer) {
            $patientId = $request->input('patient_id');
            if ($patientId) {
                $bookingsCount = \App\Models\booking::where('patient_id', $patientId)->count();
                if ($bookingsCount > 0) {
                    return response()->json([
                        'valid' => false,
                        'message' => 'This coupon is only valid for new customers'
                    ]);
                }
            }
        }
        
        // Check if branch-specific and matches the requested branch
        if ($coupon->branch_code && $request->has('branch_code') && $coupon->branch_code != $request->input('branch_code')) {
            $branch = \App\Models\branch::find($coupon->branch_code);
            $branchName = $branch ? $branch->branch_name : 'specific branches';
            
            return response()->json([
                'valid' => false,
                'message' => "This coupon is only valid at {$branchName}"
            ]);
        }
        
        // If we got here, the coupon is valid
        $service = null;
        if ($coupon->service_id) {
            $service = \App\Models\service::find($coupon->service_id);
        }
        
        return response()->json([
            'valid' => true,
            'discount_type' => $coupon->discount_type,
            'discount_value' => $coupon->discount_value,
            'service_id' => $coupon->service_id,
            'service_name' => $service ? $service->service_name : null
        ]);
    }
}
