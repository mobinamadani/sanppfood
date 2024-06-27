<?php

namespace App\Http\Controllers\Shopper;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\AddCommentRequest;
use App\Http\Resources\CommentIndexResource;
use App\Models\Order;
use App\Models\Shopper\Cart;
use App\Models\Shopper\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index($restaurantId)
    {
        $comments = Comment::all();

//        dd($comments);

        return response()->json([
            'comments' => CommentIndexResource::collection($comments)
        ]);

//        $carts = Cart::where('restaurant_id', $restaurantId)->pluck('id');
//        $comments = Comment::whereIn('cart_id', $carts)->get();
//
//        return response()->json([
//            'comments' => CommentIndexResource::collection($comments)
//        ]);



//
//        $cartId = Cart::checkCartRestaurantId($restaurantId)->pluck('id');
//
//        $comment = Comment::filterComment($cartId)->get();
//        return response()->json([
//            'comments' => CommentIndexResource::collection($comment)
//        ]);

    }

    public function store(AddCommentRequest $request)
    {

        $validated = $request->validated();
        $validated['shopper_id'] = Auth::guard('shopper')->id();
        $validated['food_id'] = Cart::with('foods')
            ->where('id', $request->cart_id)
            ->pluck('food_id')
            ->first();

        $comment = Comment::create($validated);

        return response()->json([
            'msg' => __('response.comment_created_successfully')
        ]);
    }
//        $validated = $request->validated();
//        $validated['shopper_id'] = Auth::guard('shopper')->id();
//        $validated['food_id'] = Cart::with('foods')
//            ->where('id' , $request->cart_id)
//            ->pluck('food_id')
//            ->first();
//        $validated['food_id'] =
//            Comment::query()->create($validated);
//        return response()->json([
//            'msg'=>__('response.comment_created_successfully')
//        ]);
//    }

    public function show(int $orderId)
    {
        $cartId = Order::cartIdByOrderId($orderId);
        $comments = Comment::commentByCartId($cartId);
        return view('seller.comment' , compact(['comments' ,'orderId']));
    }


}
