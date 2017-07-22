<?php
/**
 * Created by PhpStorm.
 * User: Jekyn
 * Date: 17.07.2017
 * Time: 2:37
 */

namespace App\Providers;



class CustomValidator extends \Illuminate\Validation\Validator {

    public function validateUniqs($attribute, $value, $parameters)
    {

        $line=1;
        $i=0;
        if(file_exists('../storage/app/user.txt')){


        foreach(file('../storage/app/user.txt') as $line) {//для каждой строки файла пользователей
            $user=json_decode( preg_replace('/[\x00-\x1F\x80-\xFF]/', '',file('../storage/app/user.txt')[$i]),true);//декодируем строку
            if($user['login']==$value){//если логин совпадаед с логином из файла то возвращаем ошибку валидации
                return false;
            }
            $i+=1;
        }
            return true;
    }
        else{
            return true;
        }
    }
}