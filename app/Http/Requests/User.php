<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class User extends FormRequest
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
//            'account_type' => 'required|string',
//            'email'=>'required|string|email',
//            'name' => 'required|string',
//            'password' => 'required|string',
//            'billing_address' =>'string',
//            'phone' => 'required|digits:11',
//            'operating_currency' => 'string'
        ];
    }
}
