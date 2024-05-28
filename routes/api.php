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


////////////////////////////////////   **Shopper API**    /////////////////////////////////////////////
///
Route::post('/shopper-register', [\App\Http\Controllers\Shopper\AuthController::class, 'register']);
Route::post('/shopper-login', [\App\Http\Controllers\Shopper\AuthController::class, 'login']);
Route::post('shopper-logout', [\App\Http\Controllers\Shopper\AuthController::class, 'logout']);
                                         //address
//Route::get('/address-index', [\App\Http\Controllers\Shopper\AddressController::class, 'index'])->name('address.index');
//Route::post('/address-store', [\App\Http\Controllers\Shopper\AddressController::class, 'store'])->name('address.store');
//Route::post('/{address}', [\App\Http\Controllers\Shopper\AddressController::class, 'setCurrentAddress'])->name('address.setCurrentAddress');

Route::middleware('auth:shopper')->group(function () {

    //address
    Route::prefix('address')
        ->controller(\App\Http\Controllers\Shopper\AddressController::class)
        ->name('address.')
        ->group(function () {
            Route::get('/index', 'index')->name('index');
            Route::get('/store', 'store')->name('store');
            Route::post('/{address}', 'setCurrent')->name('set-current');
        });

});





//
//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
