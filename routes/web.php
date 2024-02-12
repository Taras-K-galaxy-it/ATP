<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\BusController;
use App\Http\Controllers\DriverController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::resource('brands', BrandController::class);
Route::resource('drivers', DriverController::class);
Route::resource('buses', BusController::class);
