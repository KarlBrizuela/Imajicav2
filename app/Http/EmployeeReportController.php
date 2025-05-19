<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeReportController extends Controller
{
    public function index()
    {
        return view('page.employee-report');
    }

}
