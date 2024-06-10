<?php

use App\Http\Controllers\Shopper\AddressController;
use App\Http\Controllers\Shopper\AuthController;
use App\Http\Controllers\Shopper\CartController;
use App\Http\Controllers\Shopper\CommentController;
use App\Http\Controllers\Shopper\RestaurantController;
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


////Shopper Register & Login
Route::post('/shopper-register', [\App\Http\Controllers\Shopper\AuthController::class, 'register']);
Route::post('/shopper-login', [\App\Http\Controllers\Shopper\AuthController::class, 'login']);
Route::post('shopper-logout', [\App\Http\Controllers\Shopper\AuthController::class, 'logout']);


////Shopper address
//Route::get('/address/index', [\App\Http\Controllers\Shopper\AddressController::class, 'index'])->name('address.index');
//Route::post('/address/store', [\App\Http\Controllers\Shopper\AddressController::class, 'store'])->name('address.store');
//Route::post('/{address}', [\App\Http\Controllers\Shopper\AddressController::class, 'setCurrentAddress'])->name('address.setCurrentAddress');

//Route::middleware('auth:shopper')->group(function () {
//    //address
//    Route::prefix('address')
//        ->controller(\App\Http\Controllers\Shopper\AddressController::class)
//        ->name('address.')
//        ->group(function () {
//            Route::get('/index', 'index')->name('index');
//            Route::get('/store', 'store')->name('store');
//            Route::post('/{address}', 'setCurrent')->name('set-current');
//        });
//
//});


Route::middleware('auth:shopper')->group(function () {

    Route::prefix('addresses')
        ->name('addresses.')
        ->controller(\App\Http\Controllers\Shopper\AddressController::class)
        ->group(function () {
            //address
            Route::get('/index', 'index')->name('index');
            Route::post('/store', 'store')->name('store');
            Route::post('/{address}', 'setCurrent')->name('set-current');
        });

});




////Get Restaurant
    Route::get('restaurant', [\App\Http\Controllers\Shopper\RestaurantController::class, 'index'])->name('restaurant.index');
    Route::get('restaurant/{restaurant}', [\App\Http\Controllers\Shopper\RestaurantController::class, 'show'])->name('restaurant.show');
    Route::post('restaurant', [\App\Http\Controllers\Shopper\RestaurantController::class, 'is_open'])->name('restaurant.Open');


////Get Food
    Route::get('restaurants/{restaurantId}/food', [\App\Http\Controllers\Shopper\FoodRestaurantController::class, 'index'])->name('foodRestaurant.index');


////Carts
    Route::middleware('auth:shopper')->post('AddCart', [\App\Http\Controllers\Seller\CartController::class, 'store'])->name('cart.store');
    Route::middleware('auth:shopper')->get('IndexCart', [\App\Http\Controllers\Seller\CartController::class, 'index'])->name('cart.index');
    Route::middleware('auth:shopper')->patch('carts/{cartId}', [\App\Http\Controllers\Seller\CartController::class, 'update'])->name('cart.update');
    Route::middleware('auth:shopper')->get('carts/{cartId}', [\App\Http\Controllers\Seller\CartController::class, 'show'])->name('cart.show');
    Route::middleware('auth:shopper')->post('carts/{cartId}/payment', [\App\Http\Controllers\Seller\CartController::class, 'payment'])->name('cart.payment');






