<?php
/*
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceProduct;

class ServiceProductController extends Controller
{
    public function index()
{
    $products = ServiceProduct::all(); // get all data from DB
    return view('page.service-product', compact('products'));
}
}
