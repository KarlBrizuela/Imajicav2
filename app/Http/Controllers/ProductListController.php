<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductListController extends Controller
{
public function index() {
    return view('page.product-list');
}
}
