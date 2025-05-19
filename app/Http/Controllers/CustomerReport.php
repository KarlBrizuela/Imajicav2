<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerReport extends Controller
{
    public function index()
    {
        return view('page.customer-report');
    }
}
