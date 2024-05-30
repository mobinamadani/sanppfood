<?php

namespace App\Http\Controllers\Seller;

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
        $food = Food::query()->checkFoodId($validated['food_id'])->firstOrFail();
        $validated['food_id'] = $food->id;
        $validated['restaurant_id'] = $food->restaurant_id;
        $validated['shopper_id'] = $food->shopper_id;
        $validated['seller_id'] = $food->seller_id;
        $price = (int)($food->price) * (int)($validated['count']);
        $validated['price'] = $price;

        $cart = Cart::query()->create($validated);
        $cart->foods()->attach($request->food_id);
        return response()->json([
            'msg:' => __('response.cart_stored_successfully'),
            'cart_id' => $cart->id,
        ]);
    }

    public function show(int $cartId): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $cart = Cart::query()->checkCartId($cartId)->get();
        return IndexCartResource::collection($cart);
    }

    public function update(UpdateCartRequest $request, int $cartId): \Illuminate\Http\JsonResponse
    {
        $validated = $request->validated();
        Cart::checkCartId($cartId)->update($validated);
        return response()->json([
            'msg' => __('response.cart_updated_successfully'),
        ]);
    }

    public function payment(int $cartId)
    {
        $cart = Cart::query()->find($cartId);
        if (!$cart) {
            return response()->json([
                'message' => 'Cart not found'
            ]);
        }
        $validated['cart_id'] = $cartId;
        $validated['restaurant_id'] = $cart->restaurant_id;
        $validated['seller_id'] = $cart->seller_id;
        $validated['shopper_id'] = $cart->shopper_id;
        $validated['price'] = $cart->price;

        Order::query()->create($validated);
        return response()->json([
            'msg' => __('response.order_add_successfully')
        ]);
    }



}
