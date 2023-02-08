<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});



Route::get('/admin', function () {
    return view('admin_dashboard');
});



Route::get('/admin/tricycle_drivers',[adminController::class,'drivers'])->name('tryk_drivers');
Route::get('/admin/tricycle_drivers/details/{id}',[adminController::class,'bookingdetails'])->name('driver_details');
Route::get('/admin/tricycle_drivers/passenger_list',[adminController::class,'passengers'])->name('passenger_details');



Route::get('/admin/travel_records', function () {
    return view('travel_records');
});


Route::get('/admin/passenger_list/details', function () {
    return view('passenger_details');
});




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');