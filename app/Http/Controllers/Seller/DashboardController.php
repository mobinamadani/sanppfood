<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function RestaurantInfo(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('seller.InfoRestuarant');
    }

//    public function AddFood(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
//    {
//        return view('seller.AddFood');
//    }

//    public function storeFood(Request $request): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
//    {
//        return view('seller.IndexFood');
//    }


}
