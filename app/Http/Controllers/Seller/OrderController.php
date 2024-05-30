<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function orders()
    {
        $restuarantId = Cart::query()->pluck('restuarant_id')->toArray();
        $sellersId = Restuarnt::query()->whereIn('id',$restuarantId)->firstOrfail();

        $orders = Order::query()->whereIn('status', ['در حال بررسی', 'در حال آماده  سازی', 'ارسال به مقصد']);

        return view('', compact('orders'));
    }
}
