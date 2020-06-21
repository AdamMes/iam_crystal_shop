<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            "city" => 'required|min:2|max:70',
            "street" => 'required|min:2|max:70',
            "zip" => 'digits_between:0,15',
            "phone" => "required|regex:/^0[2-9]\d{7,8}$/",

        ];
    }
}