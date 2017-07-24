<?php


namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Validator;
use File;
use Storage;
use View;

class ProfilesController extends BaseController
{
    public function index(Request $request)
    {
        $line=1;
        $i=0;
        $users=array();
        foreach(file('../storage/app/user.txt') as $line) {
            $user=json_decode( preg_replace('/[\x00-\x1F\x80-\xFF]/', '',file('../storage/app/user.txt')[$i]),true);
            $users[$i]=array(
              'login' => $user['login'],
              'password' => $user['password'],
              'email' => $user['email'],
              'first_name' => $user['first_name'],
              'surname' => $user['surname'],
              'gender' => $user['gender'],
              'mobile' => $user['mobile'],
              'avatar'=>$user['avatar'],
              'role'=>$user['role']
              );

            $i+=1;
        }


        return view('allprofiles')->with(['users'=>$users]);

    }
    public function show($id){
        $user_js=json_decode( preg_replace('/[\x00-\x1F\x80-\xFF]/', '',file('../storage/app/user.txt')[$id]),true);
        $user=array(
            'login' => $user_js['login'],
            'password' => $user_js['password'],
            'email' => $user_js['email'],
            'first_name' => $user_js['first_name'],
            'surname' => $user_js['surname'],
            'gender' => $user_js['gender'],
            'mobile' => $user_js['mobile'],
            'avatar'=>$user_js['avatar'],
            'role'=>$user_js['role']
        );
        return view('profile')->with(['user'=>$user]);
    }


}
