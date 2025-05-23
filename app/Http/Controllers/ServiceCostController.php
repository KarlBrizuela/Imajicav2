<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\DB;

class ServiceCostController extends Controller {
   public function getServiceCost(Request $request) {
    $serviceIds = $request->service_ids;

    if (!$serviceIds) {
        return response()->json([
            'success' => false,
            'message' => 'No service IDs provided'
        ], 400);
    }

    $totalCost = Service::whereIn('service_id', $serviceIds)->sum('service_cost'); 
    $totalPoints = Service::whereIn('service_id', $serviceIds)->sum('acq_pts'); // Fetch points

    return response()->json([
        'success' => true,
        'total_cost' => $totalCost,
        'total_points' => $totalPoints // Send points in response
    ]);
}
}