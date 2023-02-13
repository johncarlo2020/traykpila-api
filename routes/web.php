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





Route::get('/admin',[adminController::class,'generaldetails'])->name('admin_dashboard');



Route::get('/admin/tricycle_drivers',[adminController::class,'drivers'])->name('tryk_drivers');
Route::get('/admin/drivers_accounts',[adminController::class,'accounts'])->name('tryk_drivers_accounts');
Route::get('/admin/drivers_accounts_notverified',[adminController::class,'notverified'])->name('tryk_drivers_accounts_notverified');
// Route::get('/admin',[adminController::class,'generaldetails'])->name('general');
Route::get('/admin/tricycle_drivers/details/{id}',[adminController::class,'bookingdetails'])->name('driver_details');
Route::get('/admin/tricycle_drivers/passenger_list/details/{id}',[adminController::class,'passengerdetails'])->name('passenger_details');
// Route::get('/admin/tricycle_drivers/details/{id}',[adminController::class,'driverdetails'])->name('driver_account_details');
Route::get('/admin/tricycle_drivers/passenger_accounts',[adminController::class,'passenger_accounts'])->name('passenger_details_accounts');
Route::get('/admin/tricycle_drivers/passenger_accounts_notverified',[adminController::class,'passenger_accounts_notverified'])->name('passenger_details_accounts_notverified');
Route::get('/admin/tricycle_drivers/passenger_list',[adminController::class,'passengers'])->name('passenger_details');




Route::get('/admin/travel_records', function () {
    return view('travel_records');
});


Route::get('/admin/passenger_list/details', function () {
    return view('passenger_details');
});


Route::get('login', function () {
    return view('admin_dashboard');
});




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/admin', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin');

Route::get('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
