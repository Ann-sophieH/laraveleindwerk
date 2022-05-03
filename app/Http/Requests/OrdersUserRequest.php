<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrdersUserRequest extends FormRequest
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

        ];
    }
    /**custom messages for when order info is not present */
    public function messages()
    {
        return [
            'email.required'=>'Email is required! Please fill it in.',
            'password.required'=>'Please choose a password of minimum 8 characters.',
            'first_name.required'=>'A first name is required! Please fill it in.',
            'last_name.required'=>'A last name is required! Please fill it in.',
            'name_recipient.required'=>'An order reciepients name is required! Please fill it in.',
            'addressline_1.required'=>'A street and number is required! Please fill it in.',
            'addressline_2.required'=>'A city and postalcode is required! Please fill it in.',

                    ];
    }
}
