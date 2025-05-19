<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SystemSettingsController extends Controller
{
    public function index(){
        return view('page.system-settings');
    }
}
