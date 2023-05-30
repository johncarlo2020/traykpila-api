<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\ChartjsController;

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



Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/login', [App\Http\Controllers\Auth\LoginController::class,'showLoginForm'])->name('login');
    Route::post('/login', [App\Http\Controllers\Auth\LoginController::class,'login']);

});


Route::get('/admin',[ChartjsController::class,'generaldetails'])->middleware('auth')->name('admin_dashboard');
// Route::get('/admin',[ChartjsController::class,'chart_controller'])->name('admin_dashboard');
Route::get('/admin/reported_drivers',[adminController::class,'reported_drivers'])->middleware('auth')->name('reported_drivers');
Route::get('/admin/reported_passengers',[adminController::class,'reported_passengers'])->middleware('auth')->name('reported_passengers');
Route::get('/admin/tricycle_drivers',[adminController::class,'drivers'])->middleware('auth')->name('tryk_drivers');
Route::get('/admin/drivers_accounts',[adminController::class,'accounts'])->middleware('auth')->name('tryk_drivers_accounts');
Route::get('/admin/drivers_accounts_notverified',[adminController::class,'notverified'])->middleware('auth')->name('tryk_drivers_accounts_notverified');
// Route::get('/admin',[adminController::class,'generaldetails'])->name('general');
Route::get('/admin/tricycle_drivers/details/{id}',[adminController::class,'driver_details'])->middleware('auth')->name('driver_details');
Route::post('/admin/tricycle_drivers/details/update_tpc/{id}',[adminController::class,'update_tpc'])->name('update_tpc');


Route::post('verify_driver/{id}', [adminController::class,'verify_driver'])->name('verify_driver');


Route::post('/admin/tricycle_drivers/details/cash_out/{id}',[adminController::class,'cash_out'])->name('cash_out');
Route::get('/admin/passenger_list/details/{id}',[adminController::class,'passengerdetails'])->middleware('auth')->name('passenger_details');
//Route::get('/admin/passenger_list/details/{id}',[adminController::class,'update_tpc'])->name('passenger_details');
// Route::get('/admin/tricycle_drivers/details/{id}',[adminController::class,'driverdetails'])->name('driver_account_details');
Route::get('/admin/passenger_accounts',[adminController::class,'passenger_accounts'])->middleware('auth')->name('passenger_details_accounts');
Route::get('/admin/passenger_accounts_notverified',[adminController::class,'passenger_accounts_notverified'])->middleware('auth')->name('passenger_details_accounts_notverified');
Route::get('/admin/passenger_list',[adminController::class,'passengers'])->middleware('auth')->name('passenger_details');
Route::get('/review_documents/driver/{id}',[adminController::class,'review_documents'])->middleware('auth')->name('review_documents');





Route::get('/admin/travel_records', function () {
    return view('travel_records');
});


Route::get('/admin/passenger_list/details', function () {
    return view('passenger_details');
});


// Route::get('/login', function () {
//     return view('admin_dashboard');
// });




Auth::routes();


// Route::get('/admin', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin');



Route::get('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
