<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchImagesRequest;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller {

/*https://medium.com/justlaravel/search-functionality-in-laravel-a2527282150b
 * https://laravel.com/docs/8.x/eloquent-relationships#constraining-eager-loads*/


    //Deze data wordt automatisch door de querybuilder ge-escaped.

    function search(Request $request){
        $q = $request->get('q');

        $images_name = Image::with('user')
            ->where('image_title','LIKE','%'.$q.'%')
            ->get();

        $images_user = DB::table('images')
            ->join('users', 'images.user_id', '=', 'users.id')
            ->where('users.name', 'LIKE', '%'.$q.'%')
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
