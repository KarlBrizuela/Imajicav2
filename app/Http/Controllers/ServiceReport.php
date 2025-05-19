<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceReport extends Controller
{
    public function index()
    {
        return view('page.service-product');
    }

}
