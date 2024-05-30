<?php

namespace App\Http\Controllers\Shopper;

use App\Http\Controllers\Controller;
use App\Http\Resources\IndexRestaurantResource;
use App\Models\Admin\FoodCategory;
use App\Models\Seller\Food;
use Illuminate\Http\Request;

class FoodRestaurantController extends Controller
{
    public function index(string $restaurantId): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $restaurantFood = Food::query()->where('restaurant_id', $restaurantId)->get();
        return IndexRestaurantResource::collection($restaurantFood);
    }


}
