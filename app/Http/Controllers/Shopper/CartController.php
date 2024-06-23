<?php

namespace App\Http\Controllers\Shopper;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\StoreCartRequest;
use App\Http\Requests\API\UpdateCartRequest;
use App\Http\Resources\IndexCartResource;
use App\Models\Order;
use App\Models\Seller\Food;
use App\Models\Seller\Restaurant;
use App\Models\Shopper\Cart;
use App\Models\Shopper\Shopper;
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

        $food = Food::with('restaurant')->find($validated['food_id']);
        if (!$food) {
            return response()->json([
                'error' => 'Food not found'
            ], 400);
        }

//        if (!$food->restaurant) {
//            return response()->json([
//                'error' => 'Restaurant information missing'
//            ], 400);
//        }

        $validated['food_id'] = $food->id;
        $validated['restaurant_id'] = 1;
        $validated['seller_id'] = 1;
        $validated['shopper_id'] = auth()->id(); // Use the authenticated user's ID

        $cartPrice = (int)($food->price) * (int)($validated['count']);
        $validated['price'] = $cartPrice;

        $cart = Cart::query()->create($validated);
        $cart->foods()->attach($food->id);

        return response()->json([
            'msg' => __('response.cart_store_successfully'),
            'cart_id' => $cart->id,
        ]);


//        $validated = $request->validated();
//
//        $food = Food::with('restaurant')->find($validated['food_id']);
//        if (!$food || !$food->restaurant) {
//            return response()->json([
//                'error' => 'Invalid food or missing restaurant information'
//            ], 400);
//        }
//
//        $validated['food_id'] = $food->id;
//        $validated['restaurant_id'] = $food->restaurant_id;
//        $validated['seller_id'] = $food->seller_id;
//        $validated['shopper_id'] = auth()->id(); // Use the authenticated user's ID
//
//        $cartPrice = (int)($food->price) * (int)($validated['count']);
//        $validated['price'] = $cartPrice;
//
//        $cart = Cart::query()->create($validated);
//        $cart->foods()->attach($food->id);
//
//        return response()->json([
//            'msg:' => __('response.cart_store_successfully'),
//            'cart_id' => $cart->id,
//        ]);

//        $validated = $request->validated();
//        $food = Food::find($validated['food_id']);
//        $validated['food_id'] = $food->id;
//        $validated['restaurant_id'] = $food->restaurant_id;
//        $validated['seller_id'] = $food->seller_id;
//        $validated['shopper_id'] = auth()->id(); // Use the authenticated user's ID
//
//        $cartPrice = (int)($food->price) * (int)($validated['count']);
//        $validated['price'] = $cartPrice;
//
//        $cart = Cart::query()->create($validated);
//        $cart->foods()->attach($food->id);
//
//        return response()->json([
//            'msg:' => __('response.cart_store_successfully'),
//            'cart_id' => $cart->id,
//        ]);



//        $validated = $request->validated();
//        $food = Food::find($validated['food_id']);
//        $validated['food_id'] = $food->id;
//        $validated['restaurant_id'] = $food->restaurant_id;


//        $validated['seller_id'] = $food->seller_id;
//        $validated['seller_id'] = 1;
//        $validated['shopper_id'] = 1;
//        $validated['restaurant_id'] = 1;
//        dd($validated);
//        $cartPrice = (int)($food->price) * (int)($validated['count']);
//        $validated['price'] = $cartPrice;
//
//        $cart = Cart::query()->create($validated);
//        $cart->foods()->attach($food->id);
//
//
//        return response()->json([
//            'msg:' => __('response.cart_store_successfully'),
//            'cart_id' => $cart->id,
//        ]);


        //        $validated = $request->validated();
//        $food = Food::find($validated['food_id']);
//        $validated['food_id'] = $food->id;
//        $validated['restaurant_id'] = $food->restaurant_id;
//        $validated['shopper_id'] = \request()->shopper()->id;
//        $validated['seller_id'] = $food->seller_id;
//        $cartPrice = (int)($food->price) * (int)($validated['count']);
//        $validated['price'] = $cartPrice;
//
//        $cart = Cart::query()->create($validated);
//        $cart->food()->attach($food->id);
//        return response()->json([
//            'msg:' => __('response.cart_store_successfully'),
//            'cart_id' => $cart->id,
//        ]);
    }

    public function show(Cart $cartId): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $cart = Cart::checkcartId($cartId)->get();
        return IndexCartResource::collection($cart);

    }

    public function update(UpdateCartRequest $request, $cartId): \Illuminate\Http\JsonResponse
    {
        $validated = $request->validated();
        $cart = Cart::find($cartId);

        if ($cart) {
            $cart->update($validated);
            return response()->json([
                'msg' => __('response.cart_updated_successfully')
            ]);
        } else {
            return response()->json([
                'msg' => __('response.cart_not_found')
            ], 404);
        }
    }

    public function payment($cartId)
    {
        $cartId = (int) $cartId;
        $cart = Cart::query()->find($cartId);

        if ($cart && $cart->restaurant_id !== null) {
            $validated = [
                'cart_id' => $cartId,
                'restaurant_id' => $cart->restaurant_id,
                'seller_id' => $cart->seller_id,
                'shopper_id' => $cart->shopper_id,
                'price' => $cart->price,
            ];

            Order::query()->create($validated);
            return response()->json([
                'msg' => __('response.order_add_successfully')
            ]);
        } else {
            // Handle the case where the $cart is null or the restaurant_id is null
            return response()->json([
                'error' => 'Invalid cart or missing restaurant_id'
            ], 400);
        }

//        $cartId = (int) $cartId;
//        $cart = Cart::query()->find($cartId);
//        var_dump($cartId);
//        $validated = [
//            'cart_id' => $cartId,
//            'restaurant_id' => $cart?->restaurant_id,
//            'seller_id' => $cart?->seller_id,
//            'shopper_id' => $cart?->shopper_id,
//            'price' => $cart?->price,
//        ];
//
//        Order::query()->create($validated);
//        return response()->json([
//            'msg' => __('response.order_add_successfully')
//        ]);


//        $cart = Cart::findOrFail($cartId);
//
//        $validated['cart_id'] = $cartId;
//        $validated['restaurant_id'] = $cart->restaurant_id;
//        $validated['seller_id'] = $cart->seller_id;
//        $validated['shopper_id'] = $cart->shopper_id;
//        $validated['price'] = $cart->price;
//
//        Order::query()->create($validated);
//        return response()->json([
//            'msg' => __('response.order_add_successfully')
//        ]);

//        $cart = Cart::query()->find($cartId);
//
//
//        if ($cart) {
//            return response()->json([
//                'msg' => __('cart not found')
//            ]);
//        }

//        $validated['cart_id'] = $cartId;
//        $validated['restaurant_id'] = $cart->restaurant_id;
//        $validated['seller_id'] = $cart->seller_id;
//        $validated['shopper_id'] = $cart->shopper_id;
//        $validated['price'] = $cart->price;
//
//        Order::query()->create($validated);
//        return response()->json([
//            'msg' => __('response.order_add_successfully')
//        ]);
        }


}
