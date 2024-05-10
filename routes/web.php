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
Route::get('restaurantCategories/index', [\App\Http\Controllers\Admin\RestaurantCategoryController::class, 'index'])->name('restaurantCategories.index');
Route::get('restaurantCategories/create', [\App\Http\Controllers\Admin\RestaurantCategoryController::class, 'create'])->name('restaurantCategories.create');
Route::post('restaurantCategories/store', [\App\Http\Controllers\Admin\RestaurantCategoryController::class, 'store'])->name('restaurantCategories.store');
Route::get('restaurantCategories/edit/{id}', [\App\Http\Controllers\Admin\RestaurantCategoryController::class, 'edit'])->name('restaurantCategories.edit');
Route::put('restaurantCategories/update/{id}', [\App\Http\Controllers\Admin\RestaurantCategoryController::class, 'update'])->name('restaurantCategories.update');
Route::delete('restaurantCategories/delete/{id}', [\App\Http\Controllers\Admin\RestaurantCategoryController::class, 'destroy'])->name('restaurantCategories.delete');


//routes of adminDiscount
Route::get('AdminDiscount', [\App\Http\Controllers\Admin\DiscountController::class, 'index'])->name('AdminDiscount.index');
Route::get('AdminDiscount/create', [\App\Http\Controllers\Admin\DiscountController::class, 'create'])->name('AdminDiscount.create');
Route::post('AdminDiscount/store', [\App\Http\Controllers\Admin\DiscountController::class, 'store'])->name('AdminDiscount.store');
Route::get('AdminDiscount/edit/{id}', [\App\Http\Controllers\Admin\DiscountController::class, 'edit'])->name('AdminDiscount.edit');
Route::put('AdminDiscount/update/{id}', [\App\Http\Controllers\Admin\DiscountController::class, 'update'])->name('AdminDiscount.update');
Route::delete('AdminDiscount/delete/{id}', [\App\Http\Controllers\Admin\DiscountController::class, 'destroy'])->name('AdminDiscount.delete');


//routes of Seller
Route::get('seller/register', [\App\Http\Controllers\Seller\RegisterController::class, 'register']);
Route::post('seller/register', [\App\Http\Controllers\Seller\RegisterController::class, 'store'])->name('register.store');

//routes of Restaurant
Route::get('restaurant/form', [\App\Http\Controllers\Seller\ResturantFormController::class, 'create']);



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
