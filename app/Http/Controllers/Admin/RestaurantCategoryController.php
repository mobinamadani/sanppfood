<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RestaurantRequest;
use App\Models\Admin\RestaurantCategory;
use Illuminate\Http\Request;
use JetBrains\PhpStorm\NoReturn;

class RestaurantCategoryController extends Controller
{
        public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
        {
            $restaurantCategories = RestaurantCategory::all();
           return view('admin.RestaurantCategory.index', compact('restaurantCategories'));
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

         RestaurantCategory::query()->create($request->all());

            return redirect()->route('admin.restaurantCategory.index');
        }

        public function edit($id): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
        {
            $restaurantCategory = RestaurantCategory:: findOrfail($id);
            return view('admin.RestaurantCategoryEdit' ,compact('restaurantCategory'));
        }

        public function update(Request $request, $id): \Illuminate\Http\RedirectResponse
        {
            $data = $request->validate([
               'name' => 'required',
            ]);

            $restaurantCategory = RestaurantCategory::findOrFail($id);
            $restaurantCategory->update($data);
            return redirect()->route('admin.restaurantCategory.index');
        }

        public function destroy($id): \Illuminate\Http\RedirectResponse
        {
            $restaurantCategory = RestaurantCategory::findOrFail($id);
            $restaurantCategory->delete();

            return redirect()->route('admin.restaurantCategory.index');
        }


}
