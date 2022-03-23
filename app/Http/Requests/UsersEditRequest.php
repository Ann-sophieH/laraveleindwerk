<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersEditRequest extends FormRequest
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
            'last_name'=>'required|string|max:255',

            'first_name'=>'required|string|max:255',
            'email'=>'required|email',
            'roles'=>'required'
        ];

    }
    public function messages(){
        return[
            'email.required'=>'Email is required! Please fill it in',
            'name.required'=>'Name is required! Please fill it in',
            'role_id.required'=>'Please choose a role'

        ];
    }
}
