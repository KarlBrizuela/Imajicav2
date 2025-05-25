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
        $totalPoints = Package::whereIn('package_id', $packageIds)->sum('points'); // Assuming there's a 'points' field

        return response()->json([
            'success' => true,
            'total_cost' => $totalCost,
            'total_points' => $totalPoints // Add points
        ]);
    }
}
// Compare this snippet from app/Models/Package.php: