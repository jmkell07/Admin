<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserEditRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules($request)
    {
        
        return [
            'name'=>'required|min:3|',
            'email'=>'required|unique:users|email|email_address' . $user->id,
            'role_id'=>'required',
            'is_active'=>'required',
            'password'=>'min:5',
            'profile_pic'=>'mimes:jpeg,jpg,png | max:1000'
        ];
    }
}
