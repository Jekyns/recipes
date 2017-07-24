<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Database extends Model
{
    static public function NewUser($user){
        DB::table('users')->insert([
            "login" => $user['login'], 
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
}
