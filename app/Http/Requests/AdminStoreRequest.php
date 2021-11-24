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
            'username' => 'required|string|max:255|min:4|unique:users,username,'.$this->id,
            'email' => 'required|string|email|max:255|min:4|unique:users,email,'.$this->id,
            'phone' => 'required|unique:users,email,'.$this->id,
            'status' => 'required',
            'role' => 'required',
            'password'=> 'required|min:6',
            'password_confirmation'=> 'required|same:password'
        ];
    }
}
