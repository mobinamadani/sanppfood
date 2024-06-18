<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\Seller\Food\AddFoodRequest;
use App\Http\Requests\Seller\Food\DeleteFoodRequest;
use App\Http\Requests\Seller\Food\UpdateFoodRequest;
use App\Models\Admin\Discount;
use App\Models\Admin\FoodCategory;
use App\Models\Seller\Food;
use App\Models\Seller\Foods;
use App\Models\Seller\Restaurant;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $foods = Food::all();
        $foodCategories = FoodCategory::all();
        $discounts = Discount::all();
        return view('seller.IndexFood', compact('foods' , 'foodCategories' , 'discounts'));
    }

    public function create(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $foodCategories = FoodCategory::all();
        $discounts = Discount::all();
        return view('seller.CreateFood', compact('foodCategories', 'discounts'));
    }

    public function store(AddFoodRequest $request): \Illuminate\Http\RedirectResponse
    {
        $validated = $request->validated();

        $food = Food::query()->create($validated);

//        $food-> category()->attach($validated['food_category_id']);
        $food->category()->attach($validated['food_category_id']);
//        dd($food);
       return redirect()->route('food.index');
    }

    public function edit($id): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $food = Food::find($id);
        $foodCategories = FoodCategory::all();
        $discounts = Discount::all();

        return view('seller.EditFood', ['food' => $food, 'foodCategories' => $foodCategories, 'discounts' => $discounts]);
    }

    public function update(UpdateFoodRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {

        $findFood = Food::query()->findOrFail($id);
//        dd($findFood);
        $findFood->update([
            'name'=>$request->name,
            'recipe'=>$request->recipe,
            'price'=>$request->price,
            'food_category_id'=>$request->food_category_id,
            'discount_id'=>$request->discount_id,
        ]);
//        dd($findFood);
        return redirect()->route('food.index');
//        $validated = $request->validated();
//        $food->update($validated);

//        if (isset($validated['category_id'])) {
//            $food->categories()->sync($validated['category_id']);
//        }

//        dd($request);

    }

public function destroy(DeleteFoodRequest $request): \Illuminate\Http\RedirectResponse
{
        $food = Food::findOrFail($request->id);
        $food->delete();

        return redirect()->route('food.index');
    }



}
