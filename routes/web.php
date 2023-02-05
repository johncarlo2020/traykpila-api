<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/admin/tricycle_drivers', function () {
    return view('driver_list');
});

Route::get('/admin/tricycle_driver_details', function () {
    return view('driver_details');
});

Route::get('/admin/passenger_list', function () {
    return view('passenger_list');
});

Route::get('/admin/travel_records', function () {
    return view('travel_records');
});

Route::get('/admin/passenger_details', function () {
    return view('passenger_details');
});




Route::get('/admin/terminal_list', function () {
    return view('terminal_list');
});



