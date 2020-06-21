<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;


class ProductRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules(Request $requset)
    {

        $item_id = !empty($requset['item_id']) ? ',' . $requset['item_id'] : '';

        return [
            'category_id' => 'required',
            'title' => 'required',
            'article' => 'required',
            'image' => 'image',
            'color' => 'required',
            'size' => 'required',
            'weight' => 'required|numeric',
            'location' => 'required',
            'price' => 'required|numeric',
            'url' => 'required|regex:/^[a-z\d-]+$/|unique:products,purl' . $item_id,
        ];
    }
}