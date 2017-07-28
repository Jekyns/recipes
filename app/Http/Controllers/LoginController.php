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
use DB;

class LoginController extends BaseController
{
    public function index(Request $request)
    {
        if($request->all()) {
            $line=1;
            $i=0;
            $input_login=$request->input('name');
            $input_password=$request->input('password');
            $results = DB::select("select * from users where login = '$input_login' AND password = '$input_password'");
            if(!empty($results)){//если нашолся такой пользователь из базы данных
                session(['login' => $results[0]->login]);//то заполняем сессию
                session(['password' => $results[0]->password]);
                session(['email' => $results[0]->email]);
                session(['first_name' => $results[0]->first_name]);
                session(['surname' => $results[0]->surname]);
                session(['gender' => $results[0]->gender]);
                session(['mobile' => $results[0]->mobile]);
                session(['avatar'=>$results[0]->avatar]);
                session(['role'=>$results[0]->role]);
                session(['id'=>$results[0]->id]);
                return redirect('profile');//делаем редирект на профиль
            }
            //если такого пользователя нет то возвращаем форму входа
        }
        return redirect('login');
    }
}