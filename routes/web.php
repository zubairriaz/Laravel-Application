<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


use App\Post;
use App\User;

Route::get('/', function () {
                     $post = Post::all();
    return view('welcome',compact('post'));
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/admin',function (){

return view ('admin.index');
});
Route::group(['middleware'=>'admin'],function (){

    Route::resource('/admin/users','AdminUserController');
    Route::resource('/admin/posts','AdminPostController');
    Route::resource('/admin/category','AdminCategoryController');




});

