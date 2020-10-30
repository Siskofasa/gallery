<?php


namespace App\Http\Controllers;


use App\Models\Image;

class AdminController
{
    public function viewUploads(){
        $images = Image::all();

        return view('admin_dashboard', ['images' => $images]);
    }
}
