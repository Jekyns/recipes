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

            if ($request->hasFile('image'))//если в форме добавили картинку то добавляем эту картику в папку storage/app/images
            {
                $file = $request->file('image');
                $filename = $file->getClientOriginalName();
                \Storage::put('/images/posts/'.$filename, \File::get($file));
               // session(['avatar' =>'../storage/app/images/'.$filename]);
            }



            DB::insert('insert into posts (dish,recipe,ingredients,image,user_id) values (?,?,?,?,?)',
                [$request->input('dish'),$request->input('recipe'),$request->input('ingredients'),'../storage/app/images/posts/'.$filename,session('id')]);
            return 0;
        }


    return view('addpost');


    }

}