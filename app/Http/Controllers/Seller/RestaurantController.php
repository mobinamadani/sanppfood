<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\Seller\Restaurant\CreateRequest;
use App\Models\Admin\RestaurantCategory;
use App\Models\Seller\Restaurant;
use App\Models\Seller\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestaurantController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $userId = Auth::id();
        $restaurants = Restaurant::query()->where('user_id', Auth::id())->get();
        return view('seller.restaurantIndex', compact('restaurants'));
    }

    public function create(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
       return view('seller.resturantForm');
//        $restaurantCategories = RestaurantCategory::all();
//        $sellers = Seller::all();
//        return view('seller.restaurantForm', compact('sellers', 'restaurantCategories'));
    }

    public function store(CreateRequest $request): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        $validated = $request->validated();
        Restaurant::query()->create($validated);
        return redirect(route('seller.dashboard'));
    }


    public function edit(Restaurant $restaurant)
    {

    }

    public function update(Request $request, Restaurant $restaurant)
    {

    }

    public function destroy(Restaurant $restaurant)
    {

    }

}
