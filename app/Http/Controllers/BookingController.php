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

    $patient = patient::find($data['patient_id']);

    if (!$patient) {
        return redirect()->route('page.booking')
            ->with('error', 'Invalid patient selected.');
    }

    $isPackageBooking = isset($data['package_id']) && !empty($data['package_id']) && count($data['package_id']) > 0;
    $servicePrice = 0;

    // Calculate price for services if applicable
    if (isset($data['service_id']) && is_array($data['service_id']) && !$isPackageBooking) {
        foreach ($data['service_id'] as $serviceId) {
            $service = Service::find($serviceId);
            if (!$service) continue;
            $servicePrice += $service->service_cost;
        }
    }

    // Calculate price for packages if applicable
    if ($isPackageBooking && isset($data['package_id']) && is_array($data['package_id'])) {
        foreach ($data['package_id'] as $packageId) {
            $package = Package::with('services')->find($packageId);
            if (!$package) continue;
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
    }

    $afterCoupon = max(0, $servicePrice - $discount);
    $usedPoints = 0;
    $afterBalance = $afterCoupon;
    $afterReward = $afterBalance;

    // Calculate potential points (1 point per 100 pesos)
    $potentialPoints = floor($servicePrice / 100);
    
    if ($data['useReward'] == '1' && $patient->points > 0) {
        $usedPoints = min($patient->points, $afterBalance);
        $afterReward = $afterBalance - $usedPoints;
    }

    $totalPrice = $afterReward;

    // Store original values in the booking record
    $data['price'] = $servicePrice;
    $data['payment'] = $totalPrice;
    $data['potential_points'] = $potentialPoints; // Add potential points to booking data

    $serviceIds = $data['service_id'] ?? [];
    $packageIds = $data['package_id'] ?? [];
    unset($data['service_id'], $data['package_id']);

    $newBooking = booking::create($data);

    if (!empty($serviceIds)) {
        $newBooking->services()->attach($serviceIds);
    }

    if (!empty($packageIds)) {
        $newBooking->packages()->attach($packageIds);
    }

    if ($usedPoints > 0) {
        $patient->points -= $usedPoints;
    }

    if ($data['status'] == 'Paid') {
        $pointsToAdd = floor($servicePrice / 50);
        $patient->points += $pointsToAdd;
        $patient->total_cost += $servicePrice;

        // Create points history entry
        PatientPointsHistory::create([
            'patient_id' => $patient->patient_id,
            'points' => $pointsToAdd,
            'transaction_type' => 'earned',
            'description' => 'Points earned from booking services'
        ]);
    }

    $patient->save();

    // Return the response with points information
    if($request->wantsJson()) {
        return response()->json([
            'status' => true,
            'message' => 'Booking created successfully',
            'booking' => $newBooking,
            'points_info' => [
                'potential_points' => $potentialPoints,
                'used_points' => $usedPoints,
                'remaining_points' => $patient->points,
                'new_points_earned' => ($data['status'] == 'Paid') ? $pointsToAdd : 0
            ]
        ]);
    }

    return redirect()->route('page.booking')
        ->with('success', 'Booking created successfully')
        ->with('points_info', [
            'potential_points' => $potentialPoints,
            'used_points' => $usedPoints,
            'remaining_points' => $patient->points,
            'new_points_earned' => ($data['status'] == 'Paid') ? $pointsToAdd : 0
        ]);
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

                // Get all services and packages
                $services = $booking->services;
                $packages = $booking->packages;

                // Prepare service names and package names
                $serviceNames = $services ? $services->pluck('service_name')->implode(', ') : '';
                $packageNames = $packages ? $packages->pluck('package_name')->implode(', ') : '';

                // Create the description with package information if applicable
                $description = "";
                if ($packages && $packages->count() > 0) {
                    $description .= "Package(s): {$packageNames}\n";
                }
                if ($services && $services->count() > 0) {
                    $description .= "Service(s): {$serviceNames}\n";
                }

                // Get service and package IDs
                $serviceId = $services ? $services->pluck('service_id')->toArray() : [];
                $packageId = $packages ? $packages->pluck('package_id')->toArray() : [];

                return [
                    'id' => $booking->booking_id,
                    'title' => 'Book ' . $booking->booking_id,
                    'start' => date('Y-m-d H:i:s', strtotime($booking->start_date)),
                    'end' => date('Y-m-d H:i:s', strtotime($booking->end_date)),
                    'allDay' => false,
                    'extendedProps' => [
                        'calendar' => $statusColors[$booking->status] ?? 'Business',
                        'bookingId' => $booking->booking_id,
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
                        'branchName' => $booking->branch ? $booking->branch->branch_name : 'No Branch',
                        'start_date' => date('Y-m-d H:i:s', strtotime($booking->start_date)),
                        'end_date' => date('Y-m-d H:i:s', strtotime($booking->end_date))
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
