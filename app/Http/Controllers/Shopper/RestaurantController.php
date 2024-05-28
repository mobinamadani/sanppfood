<?php

namespace App\Http\Controllers\Shopper;

use App\Http\Controllers\Controller;
use App\Http\Resources\IndexRestaurantResource;
use App\Http\Resources\ShowRestaurantResource;
use App\Models\Seller\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $restaurants = Restaurant::all();
        return IndexRestaurantResource::collection($restaurants);
    }

    public function show(int $restaurantId): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $restaurant = Restaurant::query()->where('id' , $restaurantId)->firstOrFail();
        return ShowRestaurantResource::collection($restaurant);
    }

    public function is_open($isOpen): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $restaurants = Restaurant::query()->where('is_open' , $isOpen)->get();
        return IndexRestaurantResource::collection($restaurants);
    }
}
