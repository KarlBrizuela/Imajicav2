<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\booking;
use App\Models\service;
use App\Models\staff;
use App\Models\branch;
use App\Models\patient;
use Illuminate\Support\Facades\Log;
use App\Models\PatientPointsHistory;
use App\Models\Package;

class BookingController extends Controller
{    public function index()
    {
        $bookings = booking::with(['patient', 'services', 'packages', 'staff', 'staff.position', 'branch'])->get();
        $services = service::all();
        $staffs = staff::all();
        $branches = branch::all();
        $patients = patient::all();
        $packages = Package::with('services')->get();

        return view('page.booking', compact('bookings', 'services', 'staffs', 'branches', 'patients', 'packages'));
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'service_id' => 'nullable|required_without:package_id|array',
            'service_id.*' => 'nullable|exists:services,service_id',
            'package_id' => 'nullable|required_without:service_id|array',
            'package_id.*' => 'nullable|exists:packages,package_id',
            'status' => 'required',
            'payment' => 'nullable',
            'start_date' => 'required',
            'end_date' => 'required',
            'id' => 'required',
            'branch_code' => 'required',
            'patient_id' => 'required',
            'useReward' => 'required',
            'remarks' => 'required',
            'coupon_code' => 'nullable|exists:coupons,coupon_code',
            'discount_type' => 'nullable|in:fixed,percentage',
            'discount_value' => 'nullable|numeric',
        ]);

        // Get the patient for calculations
        $patient = patient::find($data['patient_id']);
        
        if (!$patient) {
            return redirect()->route('page.booking')
                ->with('error', 'Invalid patient selected.');
        }

        // Determine if this is a package or service booking
        $isPackageBooking = isset($data['package_id']) && !empty($data['package_id']) && count($data['package_id']) > 0;
        
        // Initialize servicePrice
        $servicePrice = 0;
        
        // Calculate price for services if applicable
        if (isset($data['service_id']) && is_array($data['service_id']) && !$isPackageBooking) {
            foreach ($data['service_id'] as $serviceId) {
                $service = Service::find($serviceId);
                if (!$service) {
                    continue;
                }
                $servicePrice += $service->service_cost;
            }
        }
        
        // Calculate price for packages if applicable
        if ($isPackageBooking && isset($data['package_id']) && is_array($data['package_id'])) {
            foreach ($data['package_id'] as $packageId) {
                $package = Package::with('services')->find($packageId);
                if (!$package) {
                    continue; // Skip invalid packages
                }
                $servicePrice += $package->services->sum('service_cost');
            }
        }

        $discount = 0;
        
        // Apply coupon discount if provided
        if (!empty($data['coupon_code']) && !empty($data['discount_type']) && !empty($data['discount_value'])) {
            if ($data['discount_type'] === 'percentage') {
                $discount = ($servicePrice * $data['discount_value']) / 100;
            } else {
                $discount = $data['discount_value'];
            }
            
            // Log the applied discount
            Log::info("Applied coupon discount: Code: {$data['coupon_code']}, Type: {$data['discount_type']}, Value: {$data['discount_value']}, Amount: {$discount}");
        }
        
        $afterCoupon = max(0, $servicePrice - $discount);
        
        // Initialize variables for tracking changes
        $usedPoints = 0;
        
        // We no longer use balance, so skip directly to points
        $afterBalance = $afterCoupon;
        
        // Apply reward points if selected
        $afterReward = $afterBalance;
        if ($data['useReward'] == '1' && $patient->points > 0) {
            // Assuming 1 point = 1 in monetary value
            $usedPoints = min($patient->points, $afterBalance);
            $afterReward = $afterBalance - $usedPoints;
        }
        
        // Set final price
        $totalPrice = $afterReward;
        
        // Store original values in the booking record
        $data['price'] = $servicePrice; // Original service price
        $data['payment'] = $totalPrice; // Final amount to pay
        
        // Remove service_id and package_id from the data array as we'll handle these separately
        // through the relationship methods
        $serviceIds = $data['service_id'] ?? [];
        $packageIds = $data['package_id'] ?? [];
        unset($data['service_id'], $data['package_id']);
        
        // Create the booking record without service_id and package_id for now
        $newBooking = booking::create($data);
        
        // Attach services to the booking using the pivot table
        if (!empty($serviceIds)) {
            $newBooking->services()->attach($serviceIds);
            Log::info("Attached services to booking ID: {$newBooking->booking_id}, Services: " . implode(', ', $serviceIds));
        }
        
        // Attach packages to the booking using the pivot table
        if (!empty($packageIds)) {
            $newBooking->packages()->attach($packageIds);
            Log::info("Attached packages to booking ID: {$newBooking->booking_id}, Packages: " . implode(', ', $packageIds));
        }
        
        // Update patient's points if used
        if ($usedPoints > 0) {
            $patient->points -= $usedPoints;
            Log::info("Deducted {$usedPoints} points from patient ID: {$patient->patient_id}. New points: {$patient->points}");
        }
        
        // Add points if this is a paid booking
        if ($data['status'] == 'Paid') {
            // Calculate points to be awarded based on service cost
            $pointsToAdd = 0;
            
            // Award 1 point per 50 pesos
            $pointsToAdd = floor($servicePrice / 50);
            
            // Add points and update total cost
            $patient->points += $pointsToAdd;
            $patient->total_cost += $servicePrice;
            
            Log::info("Added {$pointsToAdd} points to Patient ID: {$patient->patient_id}. New total: {$patient->points}");
            Log::info("Added {$servicePrice} to total_cost for Patient ID: {$patient->patient_id}. New total cost: {$patient->total_cost}");
        }
        
        // Save patient changes
        $patient->save();

        // After successfully creating the booking, handle referrer points if applicable
        if ($request->has('referrer_id') && $request->has('is_first_time') && $request->has('add_points')) {
            $referrerId = $request->input('referrer_id');
            $patientId = $request->input('patient_id');
            
            // Make sure referrer and patient are different people
            if ($referrerId != $patientId && !empty($referrerId)) {
                // Add 100 points to referrer
                $referrer = Patient::find($referrerId);
                if ($referrer) {
                    $referrer->reward_points += 100;
                    $referrer->save();
                    
                    // Log points transaction for referrer
                    PatientPointsHistory::create([
                        'patient_id' => $referrerId,
                        'points' => 100,
                        'transaction_type' => 'earned',
                        'description' => 'Received points for referring a new patient'
                    ]);
                }
                
                // Add 100 points to referred patient (new patient)
                $patient = Patient::find($patientId);
                if ($patient) {
                    $patient->reward_points += 100;
                    $patient->save();
                    
                    // Log points transaction for referred patient
                    PatientPointsHistory::create([
                        'patient_id' => $patientId,
                        'points' => 100,
                        'transaction_type' => 'earned',
                        'description' => 'Received points for being referred by another patient'
                    ]);
                }
            }
        }

        if($request->wantsJson()) {
            return response()->json([
                'status' => true,
                'message' => 'Booking created successfully',
                'booking' => $newBooking
            ]);
        }

        return redirect()->route('page.booking')
            ->with('success', 'Booking created successfully');
    }

    public function update(Request $request)
    {
        try {
            // Debug log the incoming request data
            Log::debug('Booking update request data:', $request->all());

            // Validate the request data
            $validatedData = $request->validate([
                'booking_id' => 'required|exists:bookings,booking_id',
                'start_date' => 'required|date',
                'end_date' => 'required|date|after:start_date',
                'id' => 'required|exists:staff,id',
                'branch_code' => 'required|exists:branch,branch_code',
                'patient_id' => 'required|exists:patient,patient_id',
                'edit_booking_type' => 'required|in:service,package',
                'service_id' => 'array|required_if:edit_booking_type,service',
                'service_id.*' => 'exists:service,service_id',
                'package_id' => 'array|required_if:edit_booking_type,package',
                'package_id.*' => 'exists:package,package_id',
                'discount_type' => 'nullable|in:percentage,fixed',
                'discount_value' => 'nullable|numeric|min:0',
                'use_reward_points' => 'nullable|boolean',
                'reward_points' => 'nullable|numeric|min:0',
                'status' => 'required|in:Pending,Paid,Cancelled,Completed,No Show',
                'remarks' => 'nullable|string',
                'referrer_id' => 'nullable|exists:patient,patient_id',
                'is_first_time' => 'nullable|boolean',
                'add_points' => 'nullable|boolean'
            ]);

            // Find the booking to update
            $booking = Booking::findOrFail($validatedData['booking_id']);
            
            // Extract service_id and package_id for relationship handling
            $serviceIds = $validatedData['service_id'] ?? [];
            $packageIds = $validatedData['package_id'] ?? [];
            unset($validatedData['service_id'], $validatedData['package_id'], $validatedData['edit_booking_type']);
            
            // Update the booking with validated data
            $booking->update($validatedData);
            
            // Sync services and packages based on booking type
            if ($request->input('edit_booking_type') === 'service') {
                // Detach all packages and sync services
                $booking->packages()->detach();
                $booking->services()->sync($serviceIds);
                Log::info("Updated services for booking ID: {$booking->booking_id}, Services: " . implode(', ', $serviceIds));
            } else {
                // Detach all services and sync packages
                $booking->services()->detach();
                $booking->packages()->sync($packageIds);
                Log::info("Updated packages for booking ID: {$booking->booking_id}, Packages: " . implode(', ', $packageIds));
            }

            return response()->json(['message' => 'Booking updated successfully']);
        } catch (\Exception $e) {
            Log::error("Error updating booking: {$e->getMessage()}", [
                'trace' => $e->getTraceAsString(),
                'request' => $request->all()
            ]);
            
            return response()->json(['error' => 'Failed to update booking: ' . $e->getMessage()], 500);
        }
    }

    public function delete(Request $request)
    {
        try {
            // Validate booking ID
            $validatedData = $request->validate([
                'booking_id' => 'required|exists:bookings,booking_id'
            ]);

            $booking = booking::findOrFail($validatedData['booking_id']);
            $booking->delete();

            if ($request->wantsJson()) {
                return response()->json([
                    'status' => true,
                    'message' => 'Booking deleted successfully'
                ]);
            }

            return redirect()->route('page.booking')
                ->with('success', 'Booking deleted successfully');

        } catch (\Exception $e) {
            Log::error('Error deleting booking: ' . $e->getMessage());
            
            if ($request->wantsJson()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Error deleting booking: ' . $e->getMessage()
                ], 500);
            }

            return redirect()->back()
                ->with('error', 'Error deleting booking: ' . $e->getMessage());
        }
    }

    public function getCalendarBookings()
    {
        try {
            $bookings = booking::with(['patient', 'staff', 'branch'])->get();
            
            $events = $bookings->map(function($booking) {
                $statusColors = [
                    'Pending' => 'Business',
                    'Paid' => 'Personal', 
                    'Cancelled' => 'Holiday',
                    'Completed' => 'Family',
                    'No Show' => 'ETC'
                ];

                // Determine if this is a package booking
                $isPackageBooking = !empty($booking->package_id);
                
                // Get all services and packages
                $services = $booking->services();
                $packages = $booking->packages();
                
                // Prepare service names and package names
                $serviceNames = $services->pluck('service_name')->implode(', ');
                $packageNames = $packages->pluck('package_name')->implode(', ');
                
                // Create the description with package information if applicable
                $description = "";
                if ($isPackageBooking) {
                    $description .= "Package(s): {$packageNames}\n";
                }
                
                $description .= "Service(s): {$serviceNames}\n";
                $description .= "Staff: " . ($booking->staff ? $booking->staff->firstname . ' ' . $booking->staff->lastname : 'Unassigned') . "\n" .
                               "Branch: " . ($booking->branch ? $booking->branch->branch_name : 'N/A') . "\n" .
                               "Status: " . $booking->status;

                // Format service_id and package_id for the response
                $serviceId = $booking->service_id;
                $packageId = $booking->package_id;
                
                // Log the data for debugging
                Log::debug("Calendar event for booking #{$booking->booking_id}", [
                    'service_id' => $serviceId,
                    'package_id' => $packageId
                ]);

                return [
                    'id' => $booking->booking_id,
                    'title' => 'Book ' . $booking->booking_id,
                    'start' => $booking->start_date,
                    'end' => $booking->end_date,
                    'allDay' => false,
                    'extendedProps' => [
                        'calendar' => $statusColors[$booking->status] ?? 'Business',
                        'bookingId' => $booking->booking_id, // Add explicit booking ID
                        'status' => $booking->status,
                        'serviceId' => $serviceId,
                        'packageId' => $packageId,
                        'staffId' => $booking->id,
                        'branchCode' => $booking->branch_code,
                        'patientId' => $booking->patient_id,
                        'useReward' => $booking->useReward,
                        'remarks' => $booking->remarks,
                        'description' => $description,
                        'patientName' => $booking->patient ? $booking->patient->firstname . ' ' . $booking->patient->lastname : 'No Patient',
                        'serviceNames' => $serviceNames,
                        'packageNames' => $packageNames,
                        'staffName' => $booking->staff ? $booking->staff->firstname . ' ' . $booking->staff->lastname : 'Unassigned',
                        'branchName' => $booking->branch ? $booking->branch->branch_name : 'No Branch'
                    ]
                ];
            });
            
            return response()->json($events);
        } catch (\Exception $e) {
            Log::error('Error fetching calendar bookings: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Check if a patient is making their first booking
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function checkFirstTimePatient(Request $request)
    {
        // Validate request
        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,patient_id'
        ]);

        // Count patient's existing bookings
        $bookingCount = Booking::where('patient_id', $validated['patient_id'])->count();
        
        // Return true if this is their first booking
        return response()->json([
            'is_first_time' => ($bookingCount === 0),
            'booking_count' => $bookingCount
        ]);
    }    public function getBookingDetails($bookingId)
    {
        try {
            // Load booking with all necessary relationships
            $booking = booking::with([
                'services', 
                'patient', 
                'staff', 
                'staff.position', // Include staff position information
                'branch', 
                'packages',
                'notes',         // Include booking notes
                'notes.user'     // Include user who created the note
            ])->findOrFail($bookingId);
            
            // Extract and format necessary data
            $data = $booking->toArray();
            
            return response()->json($data);
        } catch (\Exception $e) {
            Log::error('Error fetching booking details: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }

    /**
     * Save a quick note for a booking
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */    public function saveQuickNote(Request $request)
    {
        // Validate request
        $validated = $request->validate([
            'booking_id' => 'required|exists:bookings,booking_id',
            'note' => 'required|string|max:1000'
        ]);

        try {            // Create a new booking note
            $note = new \App\Models\BookingNote();
            $note->booking_id = $validated['booking_id'];
            $note->note = $validated['note'];
            $note->user_id = auth()->id() ?? 1; // Default to admin if not logged in
            $note->save();
            
            // Reload with user relationship for the response
            $note = \App\Models\BookingNote::with('user')->find($note->id);

            return response()->json([
                'success' => true,
                'message' => 'Note saved successfully',
                'note' => $note
            ]);
        } catch (\Exception $e) {
            Log::error('Error saving booking note: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to save note: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get notes for a specific booking
     *
     * @param int $bookingId
     * @return \Illuminate\Http\JsonResponse
     */
    public function getBookingNotes($bookingId)
    {
        try {
            // Find booking notes with user information
            $notes = \App\Models\BookingNote::with('user')
                ->where('booking_id', $bookingId)
                ->orderBy('created_at', 'desc')
                ->get();
            
            // Format notes for response
            $formattedNotes = $notes->map(function($note) {
                return [
                    'id' => $note->id,
                    'created_at' => $note->created_at,
                    'note' => $note->note,
                    'staff' => $note->user ? $note->user->name : 'System'
                ];
            });
            
            return response()->json([
                'success' => true,
                'notes' => $formattedNotes
            ]);
        } catch (\Exception $e) {
            Log::error('Error fetching booking notes: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve notes: ' . $e->getMessage()
            ], 500);
        }
    }
}