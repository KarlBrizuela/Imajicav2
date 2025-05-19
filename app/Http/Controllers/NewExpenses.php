<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewExpenses extends Controller
{
    public function index()
    {
        return view('page.new-expenses');
    }
}
