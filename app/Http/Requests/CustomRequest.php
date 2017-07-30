<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */



    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'login' => 'required|uniqs',
            'pass' => 'required',
            'email' => 'required|email',
            'first_name' => 'required',
            'surname' => 'required',
            'gender' => 'required',
            'mobile' => 'required',];
    }
	
    public function messages()
    {
        return [
            'login.required' => 'Hey, you forgot your login!',
            'login.uniqs' => 'That login has already been taken',
            'pass.required' => 'Hey, you forgot your password!',
            'email.required' => 'Hey, you forgot your email address!',
            'email.email' => 'Ivalid email',
            'first_name.required' => 'Hey, you forgot your first name',
            'surname.required' => 'Hey, you forgot your surname!',
            'mobile.required' => 'Hey, you forgot your phone number!',
        ];
    }
}
