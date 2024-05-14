<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
//
//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});


    //**Shopper API **
Route::post('/shopper-register', [\App\Http\Controllers\Shopper\AuthController::class, 'register']);
Route::post('/shopper-login', [\App\Http\Controllers\Shopper\AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('shopper-logout', [\App\Http\Controllers\Shopper\AuthController::class, 'logout']);






