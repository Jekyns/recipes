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
use DB;

class PostController extends BaseController
{
    public function addPost(Request $request){
        if($request->all()){
            
            DB::insert('insert into posts (dish,recipe,user_id) values (?,?,?)',
                [$request->input('dish'),$request->input('recipe'),1]);
            return 0;
        }


    return view('addpost');


    }

}