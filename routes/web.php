<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('home', [\App\Http\Controllers\HomeController::class, 'index']);

//routes of Admin
Route::get('admin/login', [\App\Http\Controllers\Admin\AuthController::class, 'login'])->name('admin.login');
Route::post('admin/store', [\App\Http\Controllers\Admin\AuthController::class, 'store'])->name('admin.store');
Route::get('admin/dashboard', [\App\Http\Controllers\Admin\AuthController::class, 'dashboard'])->name('admin.dashboard');
Route::delete('/logout', [\App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('logout');


//routes of AdminFoodCategory
Route::get('foodCategory/index', [\App\Http\Controllers\Admin\FoodCategoryController::class])->name('foodCategory.index');
Route::get('foodCategory/create', [\App\Http\Controllers\Admin\FoodCategoryController::class, 'create'])->name('foodCategory.create');
Route::post('foodCategory/store', [\App\Http\Controllers\Admin\FoodCategoryController::class, 'store'])->name('foodCategory.store');
Route::get('foodCategory/edit/{id}', [\App\Http\Controllers\Admin\FoodCategoryController::class, 'edit'])->name('foodCategory.edit');
Route::put('foodCategory/update/{id}', [\App\Http\Controllers\Admin\FoodCategoryController::class, 'update'])->name('foodCategory.update');
Route::delete('foodCategory/delete/{id}', [\App\Http\Controllers\Admin\FoodCategoryController::class, 'destroy'])->name('foodCategory.delete');


//routes of AdminRestaurantCategory
Route::get('restaurantCategories/index', [\App\Http\Controllers\Admin\RestaurantCategoryController::class])->name('restaurantCategories.index');
Route::get('restaurantCategories/create', [\App\Http\Controllers\Admin\RestaurantCategoryController::class, 'create'])->name('restaurantCategories.create');
Route::post('restaurantCategories/store', [\App\Http\Controllers\Admin\RestaurantCategoryController::class, 'store'])->name('restaurantCategories.store');
Route::get('restaurantCategories/edit/{id}', [\App\Http\Controllers\Admin\RestaurantCategoryController::class, 'edit'])->name('restaurantCategories.edit');
Route::put('restaurantCategories/update/{id}', [\App\Http\Controllers\Admin\RestaurantCategoryController::class, 'update'])->name('restaurantCategories.update');
Route::delete('restaurantCategories/delete/{id}', [\App\Http\Controllers\Admin\RestaurantCategoryController::class, 'destroy'])->name('restaurantCategories.delete');


//routes of Seller
Route::get('seller/register', [\App\Http\Controllers\Seller\RegisterController::class, 'register']);
Route::post('seller/register', [\App\Http\Controllers\Seller\RegisterController::class, 'store'])->name('register.store');

//routes of Restaurant
Route::get('restaurant/form', [\App\Http\Controllers\Seller\ResturantFormController::class, 'create']);



