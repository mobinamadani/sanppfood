<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\Seller\RegisterRequest;
use App\Models\Seller\Seller;

class RegisterController extends Controller
{
    public function register(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('seller.register');
    }

    public function store(RegisterRequest $request): \Illuminate\Http\RedirectResponse
    {
        /**
         * @var seller $Seller
         */

        $seller = Seller::query()->create([
            'name' => $request->get('name'),
            'email'=> $request->get('email'),
            'phone_number'=> $request->get('phone_number'),
            'password'=> bycrypt($request->get('password'))
        ]);

        auth()->login($seller);
        return redirect(route('home'));

    }
        public function show()
        {


        }

}
