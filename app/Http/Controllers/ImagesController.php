<?php
//I used this tutorial to make this: https://medium.com/@mactavish10101/how-to-upload-images-in-laravel-7-7a7f9982ebba
namespace App\Http\Controllers;

use App\Http\Requests\StoreImagesRequest;
use App\Models\Image;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class ImagesController extends Controller
{
    public function store(StoreImagesRequest $request) {

        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                //
                $validated = $request->validated();
                $extension = $request->image->extension();
                $request->image->storeAs('/public', $validated['title'].".".$extension);
                $url = Storage::url($validated['title'].".".$extension);
                $file = Image::create([
                    'user_id' => Auth::id(),
                    'image_link' => $url,
                    'image_title' => $validated['title'],
                    'image_description' => $validated['description'],
                    'image_category' => $validated['category'],
                ]);
                Session::flash('success', "Success!");
                return \Redirect::back();
            }
        }
        abort(500, 'Could not upload image :(');
    }

    public function viewUpload($selected_image) {
        $image = Image::where('id', $selected_image)->first();
        $like_exists = Like::where('user_id', Auth::id())->where('image_id', $image->id)->exists();
        return view('view_upload', ['image'=> $image, 'like_exists'=> $like_exists]);
    }


}

