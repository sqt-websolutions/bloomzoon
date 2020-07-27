<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Product extends FormRequest
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
            'product_name' => 'required|string',
            'product_description'=> 'required|string',
            'product_meta' => 'string',
            'category_id'=> 'integer',
            'stock_level' => 'string',
            'product_price' => 'required|string',
            'product_sales_price'=> 'string',
            'user_id'=>'required|int'
        ];
    }
}
