<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;


class ContentRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules(Request $requset)
    {

        return [
            'menu_id' => 'required',
            'title' => 'required',
            'article' => 'required',
        ];
    }
}