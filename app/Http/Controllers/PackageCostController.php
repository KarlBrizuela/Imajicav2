<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;

class PackageCostController extends Controller {
    public function getPackageCost(Request $request) {
        $packageIds = $request->package_ids;

        if (!$packageIds) {
            return response()->json([
                'success' => false,
                'message' => 'No package IDs provided'
            ], 400);
        }

       $totalCost = Package::whereIn('package_id', $packageIds)->sum('price');

        return response()->json([
            'success' => true,
            'total_cost' => $totalCost
        ]);
    }
}



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

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
