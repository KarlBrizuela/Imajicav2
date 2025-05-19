<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommissionEmployeeController extends Controller
{
    public function index(){
        return view('page.commision-employee');
    }
}
