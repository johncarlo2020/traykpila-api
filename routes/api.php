<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TerminalController;
use App\Http\Controllers\TricycleController;



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
Route::post('/login',[AuthController::class,'login']);
Route::post('/terminal/create',[TerminalController::class,'addimage']);
Route::post('/terminal',[TerminalController::class,'index']);
Route::post('/terminal/show',[TerminalController::class,'show']);
Route::post('/terminal/delete',[TerminalController::class,'destroy']);
Route::post('/terminal/update',[TerminalController::class,'edit']);
Route::post('/terminal/count',[TerminalController::class,'TerminalCount']);
Route::post('/tricyle/create',[TricycleController::class,'create']);
Route::post('/tricyle/{id}',[TricycleController::class,'show']);


Route::post('/user/count',[TerminalController::class,'UserCount']);
Route::post('/driver/count',[TerminalController::class,'DriverCount']);








Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::post('/logout',[AuthController::class,'logout']);
    Route::post('/user',[AuthController::class,'user']);
   

});

