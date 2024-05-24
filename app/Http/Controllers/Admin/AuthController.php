<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use App\Models\Admin\Admin;

class AuthController extends Controller
{
    public function login(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.login');
    }


    public function store(LoginRequest $request): \Illuminate\Http\RedirectResponse
    {
        /**
         * @var Admin $admin
         */

        $admin = Admin::query()->create([
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password'))
        ]);

//        dd($request->all());

        auth()->login($admin);

        return redirect()->route('admin.dashboard');

    }


    public function dashboard(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.dashboard');
    }

  public function logout(): \Illuminate\Http\RedirectResponse
  {
        auth()->logout();

        return redirect()->route('admin.login');
  }

}
