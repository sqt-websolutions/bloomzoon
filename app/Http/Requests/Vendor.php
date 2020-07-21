<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Vendor extends FormRequest
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
            'address',
            'state',
            'region',
            'featured_img_url',
            'service_type',
            'service_category',
            'user_id',
            'identity_file_url',
            'delivery_mode'
        ];
    }
}
