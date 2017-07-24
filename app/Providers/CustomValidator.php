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
        $all=DB::table('users')->get();//�������� ��� ������ ���� ������
        for($i=0;isset($all[$i]);++$i) { //���� �� ����������� ������ ���� ������
            if($all[$i]->login==$value){
                return false;
            }
        }
        return true;
    }
}