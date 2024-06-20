<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Shopper\Comment;
use App\Models\Shopper\Shopper;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::query()->where('delete_request' , '=' , 1)->paginate(5);
        $userName = [];

        if ($comments->isNotEmpty()){
            $userId = $comments->pluck('user_id')->toArray();
            $userName = Shopper::query()->where('id' , $userId)->pluck('name');
        }
        return view('panel-pages.admin.comments.index' , compact(['comments' , 'userName']));
    }

    public function destroy(int $commentId)
    {
        Comment::query()->find($commentId)->delete();
        return redirect()->back();
    }
}
