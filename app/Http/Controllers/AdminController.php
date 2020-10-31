<?php


namespace App\Http\Controllers;


use App\Http\Requests\UpdateVisibilityRequest;
use App\Models\Image;
use Illuminate\Http\Request;

class AdminController
{

    public function updateVisibility(UpdateVisibilityRequest $request){
        $image_id = $request->input('image_id');
        $image = Image::where('id', $image_id)->first();
        $image->is_visible = !$image->is_visible;

        $image->save();
        return response()->json(['image'=>$image]);
    }


    public function viewUploads(){
        $images = Image::all();

        return view('admin_dashboard', ['images' => $images]);
    }
}
