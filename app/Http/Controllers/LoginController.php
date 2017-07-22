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

class LoginController extends BaseController
{
    public function index(Request $request)
    {
        if($request->all()) {
            $line=1;
            $i=0;
            foreach(file('../storage/app/user.txt') as $line) {//для каждой строки файла пользователей
                $user=json_decode( preg_replace('/[\x00-\x1F\x80-\xFF]/', '',file('../storage/app/user.txt')[$i]),true);//декодируем строку
                if($user['login']==$request->input('name')&&($user['password']==$request->input('password'))){//если логин и пароль совпадаед с логином и паролем из файла то заносим все данные в сессию
                    session(['login' => $user['login']]);
                    session(['password' => $user['password']]);
                    session(['email' => $user['email']]);
                    session(['first_name' => $user['first_name']]);
                    session(['surname' => $user['surname']]);
                    session(['gender' => $user['gender']]);
                    session(['mobile' => $user['mobile']]);
                    session(['avatar'=>$user['avatar']]);
                    session(['role'=>$user['role']]);
                    return redirect('profile');//делаем редирект на профиль
                }
                $i+=1;
            }
                return redirect('login');
        }
    }
}