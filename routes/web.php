<?php

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
use Illuminate\Http\Request;


Route::get('/', function () {
    return view('welcome');
});

Route::match(['get', 'post'],'register',function (Request $request){
    if(session()->has('login')){
        return redirect('profile');
    }
    else{
        return view('register');
    }
});

Route::match(['get', 'post'],'exit', 'MyController@quit');
Route::match(['get', 'post'], 'profile', "PostController@userPosts");
Route::match(['get', 'post'],'login',function (Request $request) {
    if(session()->has('login')){
        return redirect('profile');
    }
    else{
        return view('login');
    }
});
Route::match(['get', 'post'],'new', 'LoginController@index');

Route::match(['get', 'post'],'home/{id}', 'PostController@allPosts');

Route::match(['get', 'post'],'allprofiles', 'ProfilesController@index');

Route::get('profile/{id}', 'ProfilesController@show');

Route::match(['get', 'post'],'registration', 'MyController@index');

Route::match(['get', 'post'],'addpost', 'PostController@addpost');

Route::match(['get', 'post'], 'search', 'PostController@search');

Route::match(['get', 'post'], 'post/{id}', 'PostController@show');

Route::match(['get', 'post'], 'edit/{id}', 'PostController@editPost');

Route::match(['get', 'post'], 'update', 'PostController@update');

Route::match(['get', 'post'], 'delete', 'PostController@delete');
Route::match(['get', 'post'],'deleting/{id}', 'PostController@deleteany');
