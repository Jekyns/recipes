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

class MyController extends BaseController
{


    public function index(Request $request,CustomRequest $requestvalid){

        if(($request->all())&&(isset($requestvalid))) {
                if (!$requestvalid) {//проверяем валидатор если неудача вовзращаем форму регистрации
                    return redirect('register')->withErrors($requestvalid);

                } else { //если валидатор выполнился заносим данные из формы в сессиию
                    if ($request->hasFile('avatar'))//если в форме добавили картинку то добавляем эту картику в папку storage/app/images
                    {
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
                    session(['role'=>1]);

                    $user = array(
                        "login" => session('login'),
                        "password" => session('password'),
                        'email' => session('email'),
                        'first_name' => session('first_name'),
                        'surname' => session('surname'),
                        'gender' => session('gender'),
                        'mobile' => session('mobile'),
                        'avatar' => session('avatar'),
                        'role' => session('role')
                    );

                    Storage::disk('local')->append('user.txt', json_encode($user));
                }
                return redirect('profile');//выводим вьюху профиль
        }
        return redirect('profile');

    }
    public function quit(Request $request){//функция выхода из сессии
        $request->session()->flush();
        return redirect('register');
}

}
