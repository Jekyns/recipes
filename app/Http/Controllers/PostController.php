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
            
            if ($request->hasFile('image'))//РµСЃР»Рё РІ С„РѕСЂРјРµ РґРѕР±Р°РІРёР»Рё РєР°СЂС‚РёРЅРєСѓ С‚Рѕ РґРѕР±Р°РІР»СЏРµРј СЌС‚Сѓ РєР°СЂС‚РёРєСѓ РІ РїР°РїРєСѓ storage/app/images
            {
                $file = $request->file('image');
                $filename = $file->getClientOriginalName();
                \Storage::put('/images/posts/'.$filename, \File::get($file));
               // session(['avatar' =>'../storage/app/images/'.$filename]);
            }
            DB::insert('insert into posts (dish,recipe,ingredients,image,user_id,created_at) values (?, ?, ?, ?, ?, now())',
                       [
                           $request->input('dish'), 
                           $request->input('recipe'), 
                           $request->input('ingredients'), 
                           '../storage/app/images/posts/'.$filename, 
                           session('id'),
                       ]);
            return redirect('home');
        }
    return view('addpost');
    }
    
    public function allPosts(){
        $allposts = DB::table('posts')
            ->select('id', 'user_id', 'dish', 'ingredients', 'recipe', 'image', 'created_at')
            ->get();
        
        $userNames = DB::table('users')
            ->select('id', 'login')
            ->get();
			
        foreach ($allposts as $post){
            foreach ($userNames as $userName){
                if (($post->user_id) == ($userName->id)){
                    $post->user_id = $userName->login;
                }
            }
        }
        return view('home')->with('allposts', $allposts);
    }
    
    public function search(){
		
        $search_request = $_POST['search'];
		
        $allposts = DB::table('posts')
            ->select('id', 'user_id', 'dish', 'ingredients', 'recipe', 'image', 'created_at')
            ->where("dish", 'LIKE', "%$search_request%")
            ->get();
			
         $userNames = DB::table('users')
            ->select('id', 'login')
            ->get();
			
        foreach ($allposts as $post){
            foreach ($userNames as $userName){
                if (($post->user_id) == ($userName->id)){
                    $post->user_id = $userName->login;
                }
            }
        }
        return view('home')->with('allposts', $allposts);
    }
	
    public function show($id){
        $post = DB::table('posts')
            ->select('id', 'user_id', 'dish', 'ingredients', 'recipe', 'image', 'created_at')
            ->where("id", '=', "$id")
            ->get();
       return view('post')->with(['post' => $post[0]]);
    }
    
    public function userPosts(){
        $login= session('login');
        $user_id = DB::table('users')
            ->select('id')
            ->where('login','=',"$login")
            ->get();
        
        foreach ($user_id as $user_id){
            $id = $user_id->id;
        }
        
        $posts = DB::table('posts')
            ->select('id', 'user_id', 'dish', 'ingredients', 'recipe', 'image', 'created_at')
            ->where("user_id", '=', "$id")
            ->get();
        

        return view('profile')->with('posts', $posts);
    }
}
