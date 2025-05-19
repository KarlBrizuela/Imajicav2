<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExpensesReportController extends Controller
{
    public function index()
    {
        return view('page.expenses-report');
    }

}
