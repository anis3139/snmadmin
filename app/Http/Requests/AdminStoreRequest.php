<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminStoreRequest extends FormRequest
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
            'name' => 'required',
            'username' => 'required|string|max:255|min:4|alpha_dash|unique:admins,username,',
            'email' => 'required|string|email|max:255|min:4|unique:admins,email,',
            'phone' => 'required|min:10|max:20|unique:admins,phone,',
            'status' => 'required',
            'role' => 'required',
            'password'=> 'required|min:6',
            'password_confirmation'=> 'required|same:password'
        ];
    }
}
