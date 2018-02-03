<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PostsCreateRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'         =>'required|unique:posts|min:3',
            'body'          =>'required',
            // 'category_id'   =>'required',
            'photo_id'      =>'required'
        ];
    }
}
