<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VoidLogs;

class VoidLogController extends Controller
{
    public function voidLogs()
    {
        $voids =VoidLogs::with(['service', 'patient', 'staff', 'branch'])
               ->where('status', 'Cancelled')
               ->get();

// Or even better (more optimized):
$currentMonthVoids = VoidLogs::where('status', 'Cancelled')
                           ->whereMonth('start_date', now()->month)
                           ->with(['service', 'patient', 'staff', 'branch'])
                           ->get();

return view('page.void-logs', compact('voids'));
    }
}
