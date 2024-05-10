<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FoodRequest;
use App\Models\Admin\FoodCategory;
use Illuminate\Http\Request;

class FoodCategoryController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $foodCategories = FoodCategory::all();

        return view('foodIndex' , compact('foodCategories'));
    }

    public function create(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.CreateFoodCategory');
    }


    public function store(Request $request): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        /**
         * @var  FoodCategory $foodCategory
         */

        $request->validate([
           'name' => 'required',
        ]);

        FoodCategory::query()->create($request->all());

        return redirect('FoodCategoryIndex');

//        $foodCategory = FoodCategory::query()->create($request->only(['name']));
    }

    public function edit($id): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $foodCategory = FoodCategory::query()->findOrFail($id);
        return view('admin.FoodCategoryEdit', compact('foodCategory'));
    }

    public function update(Request $request, $id): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application
    {
        $foodCategory = FoodCategory::query()->findOrFail($id);
        $request->validate([
            'name' => 'required',
        ]);
        $foodCategory->update($request->all());
        return redirect('FoodCategoryIndex');
    }

    public function destroy($id): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application
    {
        $foodCategory = FoodCategory::query()->findOrFail($id);
        $foodCategory->delete();
        return redirect('FoodCategoryIndex');
    }
}




