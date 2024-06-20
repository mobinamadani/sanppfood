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


Route::middleware('auth:shopper')->group(function () {
    Route::prefix('addresses/')
        ->name('addresses.')
        ->controller(\App\Http\Controllers\Shopper\AddressController::class)
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/', 'store')->name('store');
            Route::post('/{address}', 'setCurrentAddress')->name('set-current');
        });
});


////Get Restaurant
    Route::get('restaurant', [\App\Http\Controllers\Shopper\RestaurantController::class, 'index'])->name('restaurant.index');
    Route::get('restaurant/{restaurant}', [\App\Http\Controllers\Shopper\RestaurantController::class, 'show'])->name('restaurant.show');
    Route::post('restaurant', [\App\Http\Controllers\Shopper\RestaurantController::class, 'is_open'])->name('restaurant.Open');


////Get Food
    Route::get('/restaurants/{restaurant}/foods', [\App\Http\Controllers\Shopper\FoodRestaurantController::class, 'index'])->name('restaurant.foods');


////Carts
    Route::middleware('auth:shopper')->post('AddCart', [CartController::class, 'store'])->name('cart.store');
    Route::middleware('auth:shopper')->get('IndexCart', [CartController::class, 'index'])->name('cart.index');
    Route::middleware('auth:shopper')->patch('carts/{cartId}', [CartController::class, 'update'])->name('cart.update');
    Route::middleware('auth:shopper')->get('carts/{cartId}', [CartController::class, 'show'])->name('cart.show');
    Route::middleware('auth:shopper')->post('carts/{cartId}/payment{cart}', [CartController::class, 'payment'])->name('cart.payment');

////ShopperComment
Route::middleware('auth:shopper')->post('comments' , [CommentController::class , 'store']);
Route::middleware('auth:shopper')->get('comments/restaurant_id/{restaurantId}' , [CommentController::class , 'index']);
