<?php

use App\Http\Controllers\Admin\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

////Welcome Page
Route::get('/', function () {
    return view('welcome');
});


////routes of AdminAuth
Route::get('admin/login', [\App\Http\Controllers\Admin\AuthController::class, 'login'])->name('admin.login');
Route::post('admin/store', [\App\Http\Controllers\Admin\AuthController::class, 'store'])->name('admin.store');
Route::get('admin/dashboard', [\App\Http\Controllers\Admin\AuthController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/logout', [\App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('logout');


////routes of AdminFoodCategory
Route::get('foodCategory/index', [\App\Http\Controllers\Admin\FoodCategoryController::class, 'index'])->name('foodCategory.index');
Route::get('foodCategory/create', [\App\Http\Controllers\Admin\FoodCategoryController::class, 'create'])->name('foodCategory.create');
Route::POST('foodCategory/store', [\App\Http\Controllers\Admin\FoodCategoryController::class, 'store'])->name('foodCategory.store');
Route::get('foodCategory/edit/{id}', [\App\Http\Controllers\Admin\FoodCategoryController::class, 'edit'])->name('foodCategory.edit');
Route::put('foodCategory/update/{id}', [\App\Http\Controllers\Admin\FoodCategoryController::class, 'update'])->name('foodCategory.update');
Route::delete('foodCategory/delete/{id}', [\App\Http\Controllers\Admin\FoodCategoryController::class, 'destroy'])->name('foodCategory.delete');


////routes of AdminRestaurantCategory
Route::get('restaurantCategories/index', [\App\Http\Controllers\Admin\RestaurantCategoryController::class, 'index'])->name('restaurantCategories.index');
Route::get('restaurantCategories/create', [\App\Http\Controllers\Admin\RestaurantCategoryController::class, 'create'])->name('restaurantCategories.create');
Route::post('restaurantCategories/store', [\App\Http\Controllers\Admin\RestaurantCategoryController::class, 'store'])->name('restaurantCategories.store');
Route::get('restaurantCategories/edit/{id}', [\App\Http\Controllers\Admin\RestaurantCategoryController::class, 'edit'])->name('restaurantCategories.edit');
Route::put('restaurantCategories/update/{id}', [\App\Http\Controllers\Admin\RestaurantCategoryController::class, 'update'])->name('restaurantCategories.update');
Route::delete('restaurantCategories/delete/{id}', [\App\Http\Controllers\Admin\RestaurantCategoryController::class, 'destroy'])->name('restaurantCategories.delete');


////routes of adminDiscount
Route::get('AdminDiscount', [\App\Http\Controllers\Admin\DiscountController::class, 'index'])->name('AdminDiscount.index');
Route::get('AdminDiscount/create', [\App\Http\Controllers\Admin\DiscountController::class, 'create'])->name('AdminDiscount.create');
Route::post('AdminDiscount/store', [\App\Http\Controllers\Admin\DiscountController::class, 'store'])->name('AdminDiscount.store');
Route::get('AdminDiscount/edit/{id}', [\App\Http\Controllers\Admin\DiscountController::class, 'edit'])->name('AdminDiscount.edit');
Route::put('AdminDiscount/update/{id}', [\App\Http\Controllers\Admin\DiscountController::class, 'update'])->name('AdminDiscount.update');
Route::delete('AdminDiscount/delete/{id}', [\App\Http\Controllers\Admin\DiscountController::class, 'destroy'])->name('AdminDiscount.delete');


////routes of SellerAuth
Route::get('seller/register', [\App\Http\Controllers\Seller\RegisterController::class, 'register'])->name('seller.register');
Route::post('seller/register', [\App\Http\Controllers\Seller\RegisterController::class, 'store'])->name('register.store');
Route::get('seller/login', [\App\Http\Controllers\Seller\RegisterController::class, 'login'])->name('seller.login');
Route::post('seller/submitLogin', [\App\Http\Controllers\Seller\RegisterController::class, 'submitLogin'])->name('seller.submitLogin');
Route::get('seller/logout', [\App\Http\Controllers\Seller\RegisterController::class, 'logout'])->name('seller.logout');


////Panel of SellerDashboard
Route::get('seller/dashboard', [\App\Http\Controllers\Seller\RegisterController::class, 'dashboard'])->name('seller.dashboard');
Route::get('restaurant/info', [\App\Http\Controllers\Seller\DashboardController::class, 'RestaurantInfo'])->name('restaurant.info');


////Order
//Route::get('seller/order', [\App\Http\Controllers\Seller\OrderController::class, 'index'])->name('seller.order');
//Route::post('seller/status{orderId}', \App\Http\Controllers\Seller\OrderController::class, 'status')->name('seller.status');


////Cart
//Route::middleware('auth:shopper')->post('carts/add' , [\App\Http\Controllers\Seller\CartController::class , 'store']);
//Route::middleware('auth:shopper')->get('carts' , [\App\Http\Controllers\Seller\CartController::class , 'index']);
//Route::middleware('auth:shopper')->patch('carts/{cartId}' , [\App\Http\Controllers\Seller\CartController::class , 'update']);
//Route::middleware('auth:shopper')->get('carts/{cartId}' , [\App\Http\Controllers\Seller\CartController::class , 'show']);
//Route::middleware('auth:customer')->get('carts/{cartId}/pay' , [\App\Http\Controllers\Seller\CartController::class , 'cartPaid']);


////routes of CreateRestaurant(Seller)
Route::get('restaurant/index',[\App\Http\Controllers\Seller\RestaurantController::class, 'index'])->name('restaurant.index');
Route::get('restaurant/form/{sellerId}', [\App\Http\Controllers\Seller\RestaurantController::class, 'create'])->name('form.create');
Route::post('restaurant/store', [\App\Http\Controllers\Seller\RestaurantController::class, 'store'])->name('restaurant.store');
Route::get('restaurant/edit/{id}', [\App\Http\Controllers\Seller\RestaurantController::class, 'edit'])->name('restaurant.edit');
Route::put('restaurant/update/{id}', [\App\Http\Controllers\Seller\RestaurantController::class, 'update'])->name('restaurant.update');
Route::delete('restaurant/delete/{id}', [\App\Http\Controllers\Seller\RestaurantController::class, 'destroy'])->name('restaurant.delete');
//Route::get('/seller/{sellerId}', [\App\Http\Controllers\Seller\RestaurantController::class,]);


///routes of Food(seller dashboard)
Route::get('food/index', [\App\Http\Controllers\Seller\FoodController::class, 'index'])->name('food.index');
Route::get('food/create', [\App\Http\Controllers\Seller\FoodController::class, 'create'])->name('food.create');
Route::post('food/store', [\App\Http\Controllers\Seller\FoodController::class, 'store'])->name('food.store');
Route::get('food/edit/{id}', [\App\Http\Controllers\Seller\FoodController::class, 'edit'])->name('food.edit');
Route::put('food/update/{id}', [\App\Http\Controllers\Seller\FoodController::class, 'update'])->name('food.update');
Route::delete('food/delete/{id}', [\App\Http\Controllers\Seller\FoodController::class, 'destroy'])->name('food.delete');




Route::get('/login', 'App\Http\Controllers\Shopper\AuthController@login')->name('login');













//**([Refactor form of routes])**

    //routes of Admin
//Route::prefix('admin')->controller(AuthController::class)->group(function(){
//    Route::get('/login', 'login')->name('admin.login');
//    Route::post('/store', 'store')->name('admin.store');
//    Route::get('/dashboard', 'dashboard')->name('admin.dashboard');
//    Route::get('/', 'logout')->name('admin.logout');
//});


    //routes of AdminFoodCategory
//Route::prefix('foodCategory')->controller(\App\Http\Controllers\Admin\FoodCategoryController::class)->group(function(){
//   Route::get('/index', 'index')->name('foodCategory.index');
//   Route::get('/create', 'create')->name('foodCategory.create');
//   Route::post('/store', 'store')->name('foodCategory.store');
//   Route::get('/edit/{id}', 'edit')->name('foodCategory.edit');
//   Route::put('/update/{id}', 'update')->name('foodCategory.update');
//   Route::delete('/destroy/{id}', 'destroy')->name('foodCategory.destroy');
//});



    //routes of AdminRestaurantCategory
//Route::prefix('restaurantCategories')->controller('RestaurantCategoryController')->group(function(){
//   Route::get('/index', 'index')->name('restaurantCategory.index');
//   Route::get('/create', 'create')->name('restaurantCategory.create');
//   Route::post('/store', 'store')->name('restaurantCategory.store');
//   Route::get('/edit/{id}', 'edit')->name('restaurantCategory.edit');
//   Route::put('/update/{id}', 'update')->name('restaurantCategory.update');
//   Route::delete('/delete/{id}', 'destroy')->name('restaurantCategory.delete');
//});


    //routes of adminDiscount
//Route::prefix('AdminDiscount')->controller(\App\Http\Controllers\Admin\DiscountController::class)->group(function(){
//    Route::get('/index', 'index')->name('adminDiscount.index');
//    Route::get('/create', 'create')->name('adminDiscount.create');
//    Route::post('/store', 'store')->name('adminDiscount.store');
//    Route::get('/edit/{id}', 'edit')->name('adminDiscount.edit');
//    Route::put('/update/{id}', 'update')->name('adminDiscount.update');
//    Route::delete('/delete/{id}', 'destroy')->name('adminDiscount.delete');
//});
