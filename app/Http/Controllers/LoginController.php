<?php

namespace App\Http\Controllers;

use App\Database as Database;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Validator;
use File;
use Storage;
use DB;

class LoginController extends BaseController
{
    public function index(Request $request)
    {
        if($request->all()){
            $user = Database::LoginUser(
                $request->input('name'), 
                $request->input('password')
            );
            //Проверка. Найдено значение или нет
            $i = 0;
            foreach ($user as $user){
                if (isset($user->login))
                    $i++;
            }
            if ($i == 1){
                return view('profile')->with('user', $user);
            }
            else{
                return view('home'); //переделать на error
            }    
        }
    }
}
