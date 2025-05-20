<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PackageController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// User Routes
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Product Routes
Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('api.products.index');
    Route::delete('/{id}', [ProductController::class, 'destroy'])->name('api.products.destroy');
});

Route::get('/bookings/{booking_id}', [BookingController::class, 'getBookingDetails']);
Route::get('/bookings/{booking_id}/notes', [BookingController::class, 'getBookingNotes']);
Route::get('/package-price/{package_id}', [PackageController::class, 'getPackagePrice']);

use App\Http\Controllers\EmployeeReportController;
Route::prefix('api')->group(function () {
    Route::get('/employees/{id}', [EmployeeReportController::class, 'getEmployee']);
    Route::get('/employees/{id}/transactions', [EmployeeReportController::class, 'getEmployeeTransactions']);
});