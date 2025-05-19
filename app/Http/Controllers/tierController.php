<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tier;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;


class tierController extends Controller
{
    public function create(Request $request)
    {
        try {
            // Log the raw request data for debugging
            Log::info('Tier creation request data', [
                'all_data' => $request->all(),
            ]);

            // Validate the form data with less strict requirements
            $data = $request->validate([
                'tier_name' => 'required|string|max:255',
                'points_required' => 'required|numeric',
                'points_to_redeem' => 'required|numeric',
                'tier_lenght' => 'required|string|max:255',
                'remarks' => 'nullable|string',
            ]);

            // Create the tier record
            $newTier = tier::create($data);

            // Log success for debugging
            Log::info('Tier created successfully', ['tier_id' => $newTier->id]);

            return redirect()->route('page.new-loyalty')->with('success', 'Tier added successfully!');
        } catch (ValidationException $e) {
            // For validation errors, get the detailed error messages
            $errors = $e->validator->errors()->all();
            $errorMsg = implode(', ', $errors);

            Log::error('Validation error when creating tier', [
                'errors' => $errors,
                'error_message' => $errorMsg
            ]);

            return redirect()->route('page.new-tier')->with('error', $errorMsg);
        }
    }

    public function list()
    {
        $tiers = tier::all();
        return view('page.tier-list', compact('tiers'));
    }

    public function update(Request $request)
    {
        // Update the tier record
         $request->validate([
                'tier_name' => 'required|string|max:255',
                'points_required' => 'required|numeric',
                'points_to_redeem' => 'required|numeric',
                'tier_lenght' => 'required|string|max:255',
                'remarks' => 'nullable|string',
            ]);

            $tier = tier::where('patient_tier_id', $request->patient_tier_id)->first();
            if (!$tier) {
                return redirect()->back()->with('error', 'Tier not found');
            }

            $tier->tier_name = $request->tier_name;
            $tier->points_required = $request->points_required;
            $tier->points_to_redeem = $request->points_to_redeem;
            $tier->tier_lenght = $request->tier_lenght;
            $tier->remarks = $request->remarks;
            $tier->save();

            // Redirect to loyalty list with success message
            return redirect()->route('page.loyalty-list')->with('success', 'Tier updated successfully');
    }

    public function delete(Request $request)
    {
        // Delete the tier record
        $request->validate([
            'patient_tier_id' => 'required',
        ]);

        $tier = tier::where('patient_tier_id', $request->patient_tier_id)->first();
        if (!$tier) {
            return redirect()->back()->with('error', 'Tier not found');
        }

        $tier->delete();

        return redirect()->back()->with('success', 'Tier deleted successfully');
    } 

    public function edit($patient_tier_id)
    {
        try {
            // Find the tier by patient_tier_id
            $tier = tier::where('patient_tier_id', $patient_tier_id)->first();
            
            if (!$tier) {
                return redirect()->route('tier.list')
                    ->with('error', 'Loyalty tier not found with ID: ' . $patient_tier_id);
            }
            
            // Return the edit view with the tier data
            return view('page.edit-loyalty', compact('tier'));
        } catch (\Exception $e) {
            return redirect()->route('tier.list')
                ->with('error', 'Error occurred while editing loyalty tier: ' . $e->getMessage());
        }
    }
}
