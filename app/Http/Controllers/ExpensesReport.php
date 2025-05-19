<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExpensesReport extends Controller
{
    public function index()
    {
        return view('page.expenses-report');
    }
}
