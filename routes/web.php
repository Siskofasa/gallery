<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

//Handling the search function
Route::get('/search', 'SearchController@search')->name('search');

//Handling the uploading and viewing screenshots
Route::view('/file-upload', 'upload')->name('upload')->middleware('auth');
Route::post('/file-upload', 'ImagesController@store')->middleware('auth')->name('post-file');
Route::view('/view-uploads', 'view_uploads' )->name('view-images');
Route::get('/view-upload/{selected_image}', 'ImagesController@viewUpload')->name('view-image');

//Handling likes
Route::post('/like-post', 'LikeController@likeChecker')->middleware('auth')->name('like');



//Handling Auth
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//Handling Roles
Route::get('admin/gm', function () {
    //
})->middleware('check_user_role:' . \App\Role\UserRole::ROLE_GM);

Route::get('admin/officer', function () {
    //
})->middleware('check_user_role:' . \App\Role\UserRole::ROLE_OFFICER);

Route::get('admin/raider', function () {
    //
})->middleware('check_user_role:' . \App\Role\UserRole::ROLE_RAIDER);

Route::get('admin/member', function () {
    //
})->middleware('check_user_role:' . \App\Role\UserRole::ROLE_MEMBER);
