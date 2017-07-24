<?php
/**
 * Created by PhpStorm.
 * User: Jekyn
 * Date: 17.07.2017
 * Time: 2:37
 */

namespace App\Providers;

use Illuminate\Support\Facades\DB;


class CustomValidator extends \Illuminate\Validation\Validator {

    public function validateUniqs($attribute, $value, $parameters)
    {
        $all=DB::table('users')->get();//содержит все строки базы данных
        for($i=0;isset($all[$i]);++$i) { //пока не закончились строки базы данных
            if($all[$i]->login==$value){
                return false;
            }
        }
        return true;
    }
}