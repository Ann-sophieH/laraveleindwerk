<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
            'username'=>'string|max:255',
            'first_name'=>'required|string|max:255',
            'last_name'=>'required|string|max:255',
            'telephone'=>'required|max:20',//not unique cause huistelefoon
            'email'=>'required|email|unique:users',
            'roles'=>'required',
            'is_active'=>'required',
            'password'=>'required'
        ];
    }
    /**custom messages for user when creating new accounts*/
    public function messages()
    {
        return [
            'email.required'=>'Email is required! Please fill it in.',
            'first_name.required'=>'A first name is required! Please fill it in.',
            'last_name.required'=>'A last name is required! Please fill it in.',

            'roles.required'=>'A role is required! Please select at least one.',

            'password.required'=>'Please choose a password of minimum 8 characters.'        ];
    }
}
