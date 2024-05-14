<?php

namespace App\Http\Controllers\Shopper;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\ShopperAuth;
use App\Models\Shopper;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(ShopperAuth $request): \Illuminate\Http\JsonResponse
    {
//        $validatedData =  $request->validate([
//           'name' => ['requires', 'string'],
//           'email'=> ['required', 'string', 'email', 'unique:users'],
//           'phone_number' => ['required', 'numeric', 'unique:users'],
//
//        ]);

        $shopper = Shopper::query()->create([
            'name'=> $request->get('name'),
            'email'=>$request->get('email'),
            'phone_number'=>$request->get('phone_number')
        ]);
        $token = $shopper->createToken('auth_token')->plainTextToken;
        return response()->json(['token'=> $token], 201);
    }

//    public function store(Request $request): \Illuminate\Http\JsonResponse
//    {
//        Shopper::query()->create();
//        return response()->json(['message' => 'success'], 201);
//    }

    public function login(ShopperAuth $request): \Illuminate\Http\JsonResponse
    {
        if (auth()->attempt($request->only('email'))) {
            $shopper = Auth::user();
            $token = $shopper->createToken('auth_token')->plainTextToken;
            return response()->json(['token' => $token], 200);
        }
        else {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

    }

    public function logout(): \Illuminate\Http\JsonResponse
    {
        auth()->user()->tokens()->delete();
        return response()->json(['message'=> 'logged out']);
    }

}
