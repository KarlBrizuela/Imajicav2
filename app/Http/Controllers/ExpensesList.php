<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\expenses;

class ExpensesList extends Controller
{
    public function index()
    {
        $expenses = expenses::with(['category_expense', 'branch'])->get();
        return view('page.expenses-list', compact('expenses'));
    }
}
