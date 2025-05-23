<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\service;

class ServiceCostController extends Controller {
    public function getServiceCost(Request $request) {
        $serviceIds = $request->service_ids;

        if (!$serviceIds) {
            return response()->json([
                'success' => false,
                'message' => 'No service IDs provided'
            ], 400);
        }

        $totalCost = Service::whereIn('service_id', $serviceIds)->sum('service_cost'); // Sum up costs

        return response()->json([
            'success' => true,
            'total_cost' => $totalCost
        ]);
    }
}