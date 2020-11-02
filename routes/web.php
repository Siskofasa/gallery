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

Route::view('/', 'welcome')->name('welcome');

//Handling the search function
Route::get('search', 'SearchController@search')->name('search');

//Handling the uploading and viewing screenshots
Route::view('file-upload', 'upload')->name('upload')->middleware('auth');
Route::post('file-upload', 'ImagesController@store')->middleware('auth')->name('post-file');
Route::view('view-uploads', 'view_uploads' )->name('view-images');
Route::get('view-upload/{selected_image}', 'ImagesController@viewUpload')->name('view-image');
Route::post('update-visibility', 'AdminController@updateVisibility')->middleware('check_user_role:' . \App\Role\UserRole::ROLE_OFFICER)->name('update-visibility');
Route::delete('delete-image', 'AdminController@deleteImage')->middleware('check_user_role:' . \App\Role\UserRole::ROLE_OFFICER )->name('delete-image');

//Handling likes
Route::post('/like-post', 'LikeController@likeChecker')->middleware('auth')->name('like');

//Handling comments
Route::post('/post-comment', 'CommentController@postComment')->middleware('auth')->name('post-comment');
Route::get('/get-comment/{selected_image}', 'CommentController@viewComments')->middleware('auth')->name('view-comment');
Route::delete('/delete-comment', 'CommentController@deleteComment')->middleware('auth')->name('delete-comment');

//Handling Auth
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('welcome');
})->name('dashboard');

//Handling roles
Route::get('admin-dashboard', 'AdminController@viewUploads')->middleware('check_user_role:' . \App\Role\UserRole::ROLE_OFFICER)->name('admin-dashboard');

/*Route::get('admin/gm', function () {
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
})->middleware('check_user_role:' . \App\Role\UserRole::ROLE_MEMBER);*/
