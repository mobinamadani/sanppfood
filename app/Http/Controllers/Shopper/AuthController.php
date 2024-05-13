<?php

namespace App\Http\Controllers\Shopper;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validatedData =  $request->validate([
           'name' => ['requires', 'string'],
           'email'=> ['required', 'string', 'email', 'unique:users'],
           'phone_number' => ['required', 'numeric', 'unique:users'],

        ]);

        $shopper = Shopper::create($validatedData);
        $token = $shopper->createToken('auth_token')->plainTextToken;
        return response()->json(['token'=> $token], 201);
    }


    public function login(Request $request)
    {
        if (auth()->attempt($request->only('email'))) {
            $shopper = Auth::user();
            $token = $shopper->createToken('auth_token')->plainTextToken;
            return response()->json(['token' => $token], 200);
        }
        return resonse()->json(['message'=> 'Unauthorized'], 401);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        return response()->json(['message'=> 'logged out']);
    }

}
