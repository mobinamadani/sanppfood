<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\Seller\Restaurant\CreateRequest;
use App\Http\Requests\seller\restaurant\DestroyRequest;
use App\Models\Admin\RestaurantCategory;
use App\Models\Seller\Restaurant;
use App\Models\Seller\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestaurantController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $user_id = Auth::id();
        $restaurants = Restaurant::query()->where('seller_id', Auth::id())->get();
        return view('seller.restaurantIndex', compact('restaurants'));
    }

    public function create($sellerId): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $sellersId = (int) $sellerId;
        $restaurantCategories = RestaurantCategory::all();

        return view('seller.resturantForm', compact('restaurantCategories', 'sellersId'));
    }

    public function store(CreateRequest $request): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        $sellerEmail = $request->input('seller_email');
        $seller = Seller::where('email', $sellerEmail)->first();

        if ($seller) {
            $validated = $request->validated();
            $validated['seller_id'] = $seller->id;

            Restaurant::query()->create($validated);
        }
//
//        dd($request->all());


        $sellerId = $request->route('sellerId');
        $validated = $request->validated();
        $validated['seller_id'] = 1;
        $validated['category_id'] = 1;
         Restaurant::query()->create($validated);
        return redirect(route('seller.login'));
//        dd($request->all());
    }

    public function edit(Restaurant $restaurant): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $restaurantCategories = RestaurantCategory::all();
        return view('seller.restaurantEdit', compact('restaurant', 'restaurantCategories'));
    }

    public function update(Request $request, Restaurant $restaurant): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        $validated = $request->validated();
        $restaurant->update($validated);
        return redirect(route('seller.restaurantIndex'));
    }

    public function destroy(DestroyRequest $request): \Illuminate\Http\RedirectResponse
    {
        Restaurant::query()->where('id' , $request->id)->delete();
        return redirect()->route('form.create');
    }

}
