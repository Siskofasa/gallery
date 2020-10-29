<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Like;
use App\Models\User;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function likeChecker(Request $request){

        $user_id = $request->input('user_id');
        $image_id = $request->input('image_id');

        $user = User::where('id', $user_id)->first();
        $image = Image::where('id', $image_id)->first();

        $like = Like::where('user_id', $user['id'])->where('image_id', $image['id']);

        if ($like->exists()){
            $like->delete();
        }

        else{
            $like = Like::create(['user_id'=>$user->id, 'image_id'=>$image->id]);
            $like->user()->associate($user);
            $like->image()->associate($image);
            $like->save();
        }

        return response()->json(['like_count'=>$image->likes()->count(), 'current_user'=>$like->exists()]);
    }
}
