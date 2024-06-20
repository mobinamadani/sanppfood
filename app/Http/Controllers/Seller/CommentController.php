<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\Seller\ResponseCommentRequest;
use App\Models\Seller\Food;
use App\Models\Seller\Restaurant;
use App\Models\Shopper\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index()
    {
        $sellerRestaurantId = Restaurant::query()->where('seller_id' , Auth::id())->get()->pluck('id')->toArray();
        $comment = Comment::with('cart')->get();
        $selectComments = $comment->map(function ($comment) use ($sellerRestaurantId){
            if (in_array($comment->cart->restaurant_id , $sellerRestaurantId)){
                return $comment->id;
            }
        });
        $comments = Comment::query()->whereIn('id' , $selectComments)->orderBy('created_at' , 'desc')->paginate(5);
        $foods = Food::query()->whereIn('id' , $comments->pluck('food_id'))->pluck('name' , 'id');
        return view('panel-pages.seller.comments.index' , compact(['comments' , 'foods']));
    }


    public function response(ResponseCommentRequest $request , int $commentId)
    {
        $validated = $request->validated();
        Comment::query()->find($commentId)->update(['response' => $validated['message']]);
        return redirect()->back();
    }


    public function approve(int $commentId)
    {
        Comment::query()->find($commentId)->update(['status' => true]);
        return redirect()->back();
    }


    public function sendDeleteRequest(int $commentId)
    {
        Comment::query()->find($commentId)->update(['delete_request' => true]);
        return redirect()->back();
    }

}
