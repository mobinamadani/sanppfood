<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\Seller\RegisterRequest;
use App\Models\Seller\Seller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('seller.register');
    }

    public function store(RegisterRequest $request): \Illuminate\Http\RedirectResponse
    {
        /**
         * @var seller $seller
         */
        $validated = $request->validated();

        $seller = Seller::query()->create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone_number' => $request->get('phone_number'),
            'password' => Hash::make($validated['password'])
        ]);

        auth()->login($seller);
        return redirect(route('form.create'));
    }

    public function login(RegisterRequest $request)
    {
        if (Auth::guard('seller')->attempt($request->validated())) {
            $request->session()->regenerate();

          return view('seller.login');
        }

    }

    function dashboard(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('seller.dashboard');
    }


    public function logout(): \Illuminate\Http\RedirectResponse
    {
        auth()->logout();

        return redirect()->route('seller.register');
    }







}
