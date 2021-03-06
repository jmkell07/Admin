<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'=>'required|min:3|',
            'email'=>'required|unique:users|email',
            'role_id'=>'required',
            'is_active'=>'required',
            'password'=>'required|min:5',
            'profile_pic'=>'mimes:jpeg,jpg,png,gif,JPEG,JPG,PNG,GIF | max:2000'
        ];
    }
}
