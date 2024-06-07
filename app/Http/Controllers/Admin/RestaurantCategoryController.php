<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AddCategoryRequest;
use App\Http\Requests\Admin\RestaurantRequest;
use App\Models\Admin\RestaurantCategory;
use Illuminate\Http\Request;
use JetBrains\PhpStorm\NoReturn;

class RestaurantCategoryController extends Controller
{
        public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
        {
            $restaurants = RestaurantCategory::all();
           return view('admin.RestaurantCategoryIndex', compact('restaurants'));
        }

        public function create(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
        {
            return view('admin.CreateRestaurantCategory');
        }

     public function store(RestaurantRequest $request): \Illuminate\Http\RedirectResponse

     {
//            dd('dum');

//            $data = $request->validate([
//               'name'=> ['required', 'string'],
//            ]);
//            RestaurantCategory::query()->create($data);

         $restaurant_categories = RestaurantCategory::query()->create($request->all());
//         dd($restaurant_categories);
         return redirect()->route('restaurantCategories.index')->with('restaurant_categories', $restaurant_categories);

//         RestaurantCategory::query()->create($request->all());

//         dd('name');
//            return redirect()->route('restaurantCategories.index');
        }

        public function edit($id): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
        {
           $restaurantCategory = RestaurantCategory::query()->findOrFail($id);
            return view('admin.RestaurantCategoryEdit' ,compact('restaurantCategory'));
        }

        public function update(AddCategoryRequest $request, int $id): \Illuminate\Http\RedirectResponse
        {
//            $restaurantCategory = RestaurantCategory::query()->findOrFail($id);
//            $restaurantCategory->update();

            $findRestaurant = RestaurantCategory::query()->findOrFail($id);
            $findRestaurant->update([
                'name'=>$request->name,
            ]);

            return redirect()->route('restaurantCategories.index', $id);
        }

        public function destroy(int $id): \Illuminate\Http\RedirectResponse
        {
            $restaurantCategory = RestaurantCategory::query()->findOrfail($id);
            $restaurantCategory->delete();

            return redirect()->route('restaurantCategories.index');
        }


}
