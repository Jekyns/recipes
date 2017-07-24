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

class ProfilesController extends BaseController
{
    public function index(Request $request)//������� ���������� ����� � �������� ���� �������������
    {
        $line=1;
        $i=0;
        $users=array(

    );
        $all=DB::table('users')->get();//�������� ��� ������ ���� ������

        for($i=0;isset($all[$i]);++$i){ //���� �� ����������� ������ ���� ������


            $users[$i]=array(//��������� ������ ���� �������������
                'login' => $all[$i]->login,
            'password' => $all[$i]->password,
            'email' =>$all[$i]->email,
            'first_name' => $all[$i]->first_name,
            'surname' =>$all[$i]->surname,
            'gender' => $all[$i]->gender,
            'mobile' => $all[$i]->mobile,
            'avatar'=>$all[$i]->avatar,
            'role'=>$all[$i]->role,
                'id'=>$all[$i]->id
            );
        }
        return view('allprofiles')->with(['users'=>$users]);//�������� ������ ���� ������������� �� ����� allprofiles
    }
    public function show($id){//���������� �������� ������������� �����
        $all=DB::table('users')->get();//�������� ��� ������ ���� ������
        $user=array(
            'login' => $all[$id]->login,
            'password' => $all[$id]->password,
            'email' => $all[$id]->email,
            'first_name' => $all[$id]->first_name,
            'surname' =>$all[$id]->surname,
            'gender' => $all[$id]->gender,
            'mobile' =>  $all[$id]->mobile,
            'avatar'=>$all[$id]->avatar,
            'role'=>$all[$id]->role
        );
        return view('profile')->with(['user'=>$user]);//���������� ����� ������� � ������ ��� ������
    }


}