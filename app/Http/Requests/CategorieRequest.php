<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;


class CategorieRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules(Request $requset)
    {

        $item_id = !empty($requset['item_id']) ? ',' . $requset['item_id'] : '';

        return [
            'title' => 'required',
            'url' => 'required|regex:/^[a-z\d-]+$/|unique:categories,curl' . $item_id,
            'article' => 'required',
            'image' => 'image',
        ];
    }
}