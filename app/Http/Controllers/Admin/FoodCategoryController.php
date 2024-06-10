<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AddCategoryRequest;
use App\Http\Requests\Admin\DeleteFoodCategoryRequest;
use App\Http\Requests\Admin\FoodRequest;
use App\Models\Admin\FoodCategory;
use App\Models\Admin\RestaurantCategory;
use Illuminate\Http\Request;

class FoodCategoryController extends Controller
{

    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $food_categories = FoodCategory::all();
        return view('admin.FoodCategoryIndex' , compact('food_categories'));
    }

    public function create(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.CreateFoodCategory');
    }

    public function store(AddCategoryRequest $request): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        $data = $request->validated();
//        $data['category_id'] = 1;

        FoodCategory::query()->create($data);
        return redirect(route('foodCategory.index'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $foodCategory = FoodCategory::query()->where('id' , $id)->first();

        return view('admin.FoodCategoryEdit' , compact( 'foodCategory','id'));
    }

    public function update(FoodRequest $request, int $id): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        $findFood = FoodCategory::query()->findOrFail($id);
        $findFood->update([
            'name'=>$request->name,
        ]);
        return redirect(route('foodCategory.index', $id));

    }

    public function destroy(int $id): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        $food = FoodCategory::query()->findOrFail($id);
        $food->delete();
        return redirect(route('foodCategory.index'));
    }

}
