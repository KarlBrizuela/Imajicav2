<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryExpensesList extends Controller
{
    public function index()
    {
        return view('page.categoryexpenses-list');
    }
}
