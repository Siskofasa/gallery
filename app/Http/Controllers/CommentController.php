<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{
    //

    public function postComment(StoreCommentRequest $request) {
        $post = Comment::create([
            'user_id' => $request['user_id'],
            'image_id' => $request['image_id'],
            'comment' => $request['comment']
        ]);
        return response()->json(['has_added' => true]);
    }

    public function viewComments($selected_image){
        $comments = Comment::with('user')->where('image_id', $selected_image)->get();
        return response()->json(['comments' => $comments]);
    }

    public function deleteComment(Request $request){
        $comment_id = $request->input('comment_id');
        $comment = Comment::find($comment_id);

        if ($comment->user_id == Auth::id()){
            $comment->delete();
            return response()->json(['has_deleted' => true]);
        }

        else {
            return response()->json(['has_deleted' => false]);
        }
    }
}
