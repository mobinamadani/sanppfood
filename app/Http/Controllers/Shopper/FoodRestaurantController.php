<?php

namespace App\Http\Controllers\Shopper;

use App\Http\Controllers\Controller;
use App\Http\Resources\IndexFoodResource;
use App\Http\Resources\IndexRestaurantResource;
use App\Models\Admin\FoodCategory;
use App\Models\Seller\Food;
use Illuminate\Http\Request;

class FoodRestaurantController extends Controller
{
    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $restaurantFood = Food::all();
        return IndexFoodResource::collection($restaurantFood);



    }


}
