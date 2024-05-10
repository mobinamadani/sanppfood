<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Seller\Seller;

class ResturantFormController extends Controller
{
    public function create(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('seller.resturantForm');
    }

    public function store()
    {
        /**
         * @var resturantForm $resturantForm
         */

        $request = $resturantForm;

        $resturantForm = Seller::query()->create([
                'name'=>$request->get('name'),
                'type'=>$request->get('type'),
                'phone_number'=>$request->get('phone_number'),
                'account'=>$request->get('account'),
                'address'=>$request->get('address'),
            ]);

        return redirect(to_route(''));
    }
}
