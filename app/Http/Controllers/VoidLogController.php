<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VoidLogs;

class VoidLogController extends Controller
{
    public function voidLogs()
    {
        // Fetch void logs with staff relationship
        $voids = VoidLogs::with(['staff'])
                         ->whereNotNull('booking_id')
                         ->orderBy('created_at', 'desc')
                         ->get();

        return view('page.void-logs', compact('voids'));
    }
}