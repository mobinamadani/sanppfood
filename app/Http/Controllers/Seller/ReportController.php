<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index()
    {
        $orders = Order::where('status', 'ارسال به مقصد')->get();
        $orderCount = $orders->count();
        $orderPrice = $orders->sum('price');
        return view('seller.report', compact(['orders', 'orderPrice', 'orderCount']));
    }

    public function weekReport()
    {
        $orders = Order::where('status', 'ارسال به مقصد')
            ->whereBetween('created_at', [Carbon::now()->subWeek()->format('Y-m-d'), Carbon::now()->format('Y-m-d')])
            ->get();
        $orderCount = $orders->count();
        $orderPrice = $orders->sum('price');
        return view('seller.report', compact(['orders', 'orderPrice', 'orderCount']));
    }

    public function monthReport()
    {
        $orders = Order::where('status', 'ارسال به مقصد')
            ->whereBetween('created_at', [Carbon::now()->subMonth()->format('Y-m-d'), Carbon::now()->format('Y-m-d')])
            ->get();
        $orderCount = $orders->count();
        $orderPrice = $orders->sum('price');
        return view('seller.report', compact(['orders', 'orderPrice', 'orderCount']));
    }


//    public function index()
//    {
//        $orders = Order::getOrderWithStatus('ارسال به مقصد');
//        $orderCount = $orders->count();
//        $orderPrice = $orders->sum('price');
//        return view('seller.report' , compact(['orders' , 'orderPrice' , 'orderCount']));
//    }
//
//    public function weekReport()
//    {
//        $orders = Order::getOrderWithStatus('ارسال به مقصد')
//            ->whereBetween('created_at' , [Carbon::now()->subWeek()->format('Y-m-d') , Carbon::now()]);
//        $orderCount = $orders->count();
//        $orderPrice = $orders->sum('price');
//        return view('seller.report' , compact(['orders' , 'orderPrice' , 'orderCount']));
//    }
//
//    public function monthReport()
//    {
//        $orders = Order::getOrderWithStatus('ارسال به مقصد')
//            ->whereBetween('created_at' , [Carbon::now()->subMonth()->format('Y-m-d') , Carbon::now()]);
//        $orderCount = $orders->count();
//        $orderPrice = $orders->sum('price');
//        return view('seller.report' , compact(['orders' , 'orderPrice' , 'orderCount']));
//    }
}
