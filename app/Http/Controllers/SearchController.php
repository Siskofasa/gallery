<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    /*
     *  'user_id',
        'image_link',
        'image_title',
        'image_description',
        'image_category',
     */

    function search(Request $request){
        $q = $request->get('q');
        $images = Image::where('image_title','LIKE','%'.$q.'%')->get();

        return response()->json(['images'=>$images]);
    }
}
