<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomRequest;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator;
use File;
use Storage;
use DB;


class MyController extends BaseController{

  public function index(Request $request, CustomRequest $requestvalid){

    if(($request->all()) && (isset($requestvalid))) {

      if (!$requestvalid) {
        return redirect('register')->withErrors($requestvalid);
      }

      else{

        if ($request->hasFile('avatar')){
          $file = $request->file('avatar');
          $filename = $file->getClientOriginalName();
          \Storage::put('/images/'.$filename, \File::get($file));
          session(['avatar' =>'../storage/app/images/'.$filename]);
        }

        else{
          session(['avatar' =>'']);
        }

        session(['login' => $request->input('login')]);
        session(['password' => $request->input('pass')]);
        session(['email' => $request->input('email')]);
        session(['first_name' => $request->input('first_name')]);
        session(['surname' => $request->input('surname')]);
        session(['gender' => $request->input('gender')]);
        session(['mobile' => $request->input('mobile')]);
        session(['role' => 1]);
          
        

          $user = array(
              'login' => session('login'),
              'password' => session('password'),
              'email' => session('email'),
              'first_name' => session('first_name'),
              'surname' => session('surname'),
              'gender' => session('gender'),
              'mobile' => session('mobile'),
              'avatar' => session('avatar'),
              'role' => session('role')
          );

          // Storage::disk('local')->append('user.txt', json_encode($user));

          DB::table('users')->insert(
              ["login" => $user['login'], 
               "password" => $user['password'], 
               "email" => $user['email'], 
               "first_name" => $user['first_name'], 
               "surname" => $user['surname'], 
               "gender" => $user['gender'], 
               "mobile" => $user['mobile'], 
               "avatar" => $user['avatar'], 
               "role" => $user['role']
              ]);
        }
        return redirect('profile');
      }
      return redirect('profile');
    }

    public function quit(Request $request){
      $request->session()->flush();
      return redirect('register');
    }
}
