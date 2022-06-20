<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductsEditRequest extends FormRequest
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
            //
            'name'=>'required|string|max:255',
           // 'price'=>'required|integer',
            'details'=>'required|string'


        ];

    }
    public function messages(){
        return[

            'name.required'=>'A product name is required! Please fill it in',
            'details.required'=>'Please give the product a decription ',
        ];
    }
}
