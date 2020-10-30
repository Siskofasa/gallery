<?php


namespace App\Http\Controllers;


use App\Models\Image;
use Illuminate\Http\Request;

class AdminController
{

    public function updateVisibility(Request $request){
        $image_id = $request->input('image_id');
        $image = Image::where('id', $image_id)->first();

        /*if ($image === 1){
            $image->update(['is_visible' => false]);
        }

        else {
            $image->update(['is_visible' => true]);
        }*/

/*        $image->update(['is_visible' => $image->is_visible === 1 ? false : true]);*/

        $image->is_visible = !$image->is_visible;

        $image->save();
        return response()->json(['image'=>$image]);
    }


    public function viewUploads(){
        $images = Image::all();

        return view('admin_dashboard', ['images' => $images]);
    }
}
