<?php

namespace App\Http\Controllers\Shopper;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Auth\ShopperAuth;
use App\Models\Shopper\Shopper;

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

        $shopper = Shopper::query()->create($request->validated());
        $token = $shopper->createToken('auth_token')->plainTextToken;
        return response()->json(['token' => $token], 201);
    }

//    public function store(Request $request): \Illuminate\Http\JsonResponse
//    {
//        Shopper::query()->create();
//        return response()->json(['message' => 'success'], 201);
//    }

    public function login(ShopperAuth $request): \Illuminate\Http\JsonResponse
    {
        $validated = $request->validated();
        $shopper = Shopper::query()->where('email', $validated['email'])->first();
        $token = $shopper->createToken('Personal Access Token')->plainTextToken;

        return response()->json([
            'date' => [
                'message' =>__('response.shopper.login.success'),
                'token' => $token
            ]
        ]);
    }




//        if (Auth::attempt([$request])) {
//            $shopper = Auth::user();
//            $token = $shopper->createToken('authToken')->plainTextToken;
//
//            return response()->json([ 'message' => 'logged in successfully'], 200);
//        }
//
//        return response()->json(['message' => 'Unauthorized'], 401);


//        if (auth()->attempt($request->only('name','email'))) {
//            $shopper = Auth::shopper();
//            $request->user()->currentAccessToken()->login();
//            return response()->json(['message' => 'Logged in successfully'], 200);
//
//        }
//        else {
//            return response()->json(['message' => 'Unauthorized'], 401);
//        }



//    public function logout(Request $request): \Illuminate\Http\JsonResponse
//    {
//        auth()->user()->token()->delete();
//        $request->user()->currentAccessToken()->delete();
//        return response()->json(['message' => 'logged out']);
//    }


}
