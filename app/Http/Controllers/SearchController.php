<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller {

/*https://laravel.com/docs/8.x/eloquent-relationships#constraining-eager-loads*/

    function search(Request $request){
        $q = $request->get('q');
        $s = $request->get('s');
        $images_name = Image::with('user')
            ->where('image_title','LIKE','%'.$q.'%')
            ->whereIn('image_category', $s)
            ->get();

        $images_user = DB::table('images')
            ->join('users', 'images.user_id', '=', 'users.id')
            ->where('users.name', 'LIKE', '%'.$q.'%')
            ->whereIn('images.image_category', $s)
            ->select('images.*', 'users.name')
            ->get();

        $images = $images_user;

        foreach ($images_name as $name) {
            $found_id = false;

            foreach ($images_user as $user) {
                if($name->id == $user->id) {
                    $found_id = true;
                }
            }
            if(!$found_id) {
                $images[] = $name;
            }
        }

        return response()->json(['images'=>$images]);
    }
}
