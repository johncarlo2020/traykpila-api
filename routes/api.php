<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TerminalController;
use App\Http\Controllers\TricycleController;
use App\Http\Controllers\BookingController;




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


Route::post('/register',[AuthController::class,'register']);
Route::post('/register_new',[AuthController::class,'register_new']);
Route::post('/active_driver',[AuthController::class,'active_driver']);

Route::post('/personal_information',[AuthController::class,'personal_information']);
Route::post('/personal_information_image',[AuthController::class,'personal_information_image']);
Route::post('/get_personal_information_image',[AuthController::class,'get_personal_information_image']);






Route::post('/login',[AuthController::class,'login']);
Route::post('/terminal/create',[TerminalController::class,'addimage']);
Route::post('/terminal/createNew',[TerminalController::class,'store']);

Route::post('/terminal',[TerminalController::class,'index']);
Route::post('/terminalDriver',[TerminalController::class,'TerminalDriver']);

Route::post('/terminal/show',[TerminalController::class,'show']);
Route::post('/terminal/delete',[TerminalController::class,'destroy']);
Route::post('/terminal/update',[TerminalController::class,'edit']);
Route::post('/terminal/count',[TerminalController::class,'TerminalCount']);

Route::post('/tricyle/create',[TricycleController::class,'create']);
Route::post('/tricyle/createNew',[TricycleController::class,'store']);

Route::post('/tricyle',[TricycleController::class,'show']);


Route::post('/user/count',[TerminalController::class,'UserCount']);
Route::post('/driver/count',[TerminalController::class,'DriverCount']);

Route::post('/booking',[BookingController::class,'index']);
Route::post('/booking/passenger',[BookingController::class,'create']);
Route::post('/booking/show',[BookingController::class,'show']);
Route::post('/booking/approve',[BookingController::class,'approved']);
Route::post('/booking/details',[BookingController::class,'details']);












Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::post('/logout',[AuthController::class,'logout']);
    Route::post('/user',[AuthController::class,'user']);
   

});

