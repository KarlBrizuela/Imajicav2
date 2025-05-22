<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class LoyaltyPointsController extends Controller {
    public function getServicePoints(Request $request) {
        $serviceIds = $request->service_ids;
        $points = Service::whereIn('service_id', $serviceIds)->sum('loyalty_pts'); // Sum points
        
        return response()->json([
            'success' => true,
            'loyalty_pts' => $points
        ]);
    }
}