<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VoidLogs;

class VoidLogController extends Controller
{
    public function voidLogs()
    {
        // Fetch void logs with related data using Eloquent relationships
        $voids = VoidLogs::with(['service', 'patient', 'staff', 'branch'])
                         ->orderBy('created_at', 'desc')
                         ->get();

        return view('page.void-logs', compact('voids'));
    }
}
