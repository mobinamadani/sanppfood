<?php

namespace App\Http\Controllers\Shopper;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\StoreCartRequest;
use App\Http\Requests\API\UpdateCartRequest;
use App\Http\Resources\IndexCartResource;
use App\Models\Seller\Food;
use App\Models\Shopper\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $cart = Cart::all();
        return IndexCartResource::collection($cart);
    }

    public function store(StoreCartRequest $request): \Illuminate\Http\JsonResponse
    {
        $validated = $request->validated();
        $food = Food::checkFoodId($validated['food_id'])->findOrFail($validated['food_id']);
        $validated['food_id'] = $food->id;
        $validated['restaurant_id'] = $food->restaurant_id;
        $validated['shopper_id'] = \request()->shopper()->id;
        $validated['seller_id'] = $food->seller_id;
        $cartPrice = (int)($food->price) * (int)($validated['count']);
        $validated['price'] = $cartPrice;

        $cart = Cart::query()->create($validated);
        $cart->foods()->attach($request->food_id);
        return response()->json([
            'msg:' => __('response.cart_store_successfully'),
            'cart_id' => $cart->id,
        ]);
    }

    public function show(Cart $cartId): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $cart = Cart::checkcartId($cartId)->get();
        return  IndexCartResource::collection($cart);

    }

    public function update(UpdateCartRequest $request, int $cartId): \Illuminate\Http\JsonResponse
    {
        $validated = $request->validated();
        $cart = Cart::checkCartId($cartId)->update($validated);
        return response()->json([
            'msg' => __('response.cart_update_successfully')
        ]);
    }

    public function cartPay(int $cartId)
    {

    }

}
