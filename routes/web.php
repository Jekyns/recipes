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
    return view('home');
});

Route::match(['get', 'post'],'register',function (Request $request) {
    if(session()->has('login')){
        return redirect('profile');
    }
    else {
        return view('register');
    }
});

Route::match(['get', 'post'],'login',function (Request $request) {
  if(session()->has('login')){
    return redirect('profile');
  }
  else {
      return view('login');
  }
});

//Route::match(['get', 'post'], 'profile', function(){
//    if (session()->has('login')) {
//        return view('profile');
//    }
//    else{
//        return '404';
//      }
//});


Route::match(['get', 'post'],'profile', 'LoginController@index');

Route::match(['get', 'post'],'home',function (Request $request) {
    return view('home');
});

Route::match(['get', 'post'],'registration', 'MyController@index');



Route::match(['get', 'post'],'allprofiles', 'ProfilesController@index');

Route::get('profile/{id}', 'ProfilesController@show');



Route::match(['get', 'post'],'exit', 'MyController@quit');