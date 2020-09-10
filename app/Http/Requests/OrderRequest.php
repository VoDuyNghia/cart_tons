<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'username' => 'required|min:10|max:100',
            'email' => 'required|email|max:100',
            'phone' => 'required|digits:10|max:30',
            'customer_shipping_province' => 'required',
            'address' => 'required|max:255'
        ];
    }

    public function messages()
    {
        return [
        
        ];
    }
}
