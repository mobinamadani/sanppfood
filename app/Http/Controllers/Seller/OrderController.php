<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Seller\Restaurant;
use App\Models\Shopper\Cart;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function order()
    {
        $cart = Cart::query()->exists();
        if($cart){
            $restaurantId = Cart::all()->pluck('restaurant_id');
            $sellerId = Restaurant::checkRestauranId($restaurantId)->firstOrFail();
            $sellerId = $sellerId->id;
            $orders = Order::checkStatus()->paginate(3);

            return view('seller.Order', compact('orders', 'cart', 'sellerId'));
        }
    }

    public function Status(Request $request, $orderId): \Illuminate\Http\RedirectResponse
    {
        Order::updateStatus($orderId , $request->input('status'));
        return back();
    }

    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $orders = Order::all();
        return view('seller.Order', compact('orders'));
    }
}
