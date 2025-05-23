<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\VoidLogs;

class VoidLogController extends Controller
{
    /**
     * Display a listing of void logs.
     *
     * @return \Illuminate\Http\Response
     */
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