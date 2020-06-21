<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;


class MenuRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules(Request $requset)
    {

        $item_id = !empty($requset['item_id']) ? ',' . $requset['item_id'] : '';

        return [
            'link' => 'required',
            'url' => 'required|regex:/^[a-z\d-]+$/|unique:menus,url' . $item_id,
            'title' => 'required',
        ];
    }
}