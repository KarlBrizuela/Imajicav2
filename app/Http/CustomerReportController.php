<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerReportController extends Controller
{
    public function index()
    {
        return view('page.customer-report');
    }

}
