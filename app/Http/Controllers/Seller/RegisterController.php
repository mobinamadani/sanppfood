<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\Seller\RegisterRequest;
use App\Http\Requests\Seller\SubmitLoginRequest;
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
        return redirect(route('form.create', 'sellerId'));
    }

    public function login(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('seller.login');
    }

    public function submitLogin(SubmitLoginRequest $request)
    {
        if (Auth::guard('sellers')->attempt($request->validated())) {
            $request->session()->regenerate();

        }
            return redirect(route('seller.dashboard'));


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
