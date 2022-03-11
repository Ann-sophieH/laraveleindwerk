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
            'name'=>'required|string',
            'email'=>'required|unique:users|email',
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
            'name.required'=>'Name is required! Please fill it in.',
            'roles.required'=>'A role is required! Please select at least one.',

            'password.required'=>'Please choose a password of minimum 8 characters.'        ];
    }
}
