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
        //$results = DB::select("select * from users where login = 'admin'");

        //var_dump($results);
        //DB::insert('insert into users (login ,password,email,first_name,surname,gender,mobile,avatar,role) values (?,?,?,?,?,?,?,?,?)', ['admin','1234','Jekyns@yandex.ru','Alex','Kuznetsov','Male','89281692961','..\/storage\/app\/images\/8dzQOyfvRp8.jpg',3]);
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
                return redirect('profile');//делаем редирект на профиль
            }
            else{                //если такого пользователя нет
                return redirect('login');
            }

        }
        return redirect('login');
    }
}