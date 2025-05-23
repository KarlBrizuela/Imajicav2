<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VoidedOrdersController extends Controller
{
    /**
     * Display a listing of voided orders.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
<<<<<<< HEAD
        // Fetch void logs with staff relationship
        $voids = VoidLogs::with(['staff'])
                         ->whereNotNull('booking_id')
                         ->orderBy('created_at', 'desc')
                         ->get();

        return view('page.void-logs', compact('voids'));
=======
        $voidedOrders = DB::table('order_void_logs')
                        ->leftJoin('users', 'order_void_logs.voided_by', '=', 'users.id')
                        ->select(
                            'order_void_logs.*',
                            'users.name as voided_by_name'
                        )
                        ->orderBy('voided_at', 'desc')
                        ->get();

        return view('page.voided-orders', compact('voidedOrders'));
>>>>>>> origin/main
    }
}