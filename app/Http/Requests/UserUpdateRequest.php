<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'username' => 'required|string|max:50|min:4|unique:users,username,'.$this->id,
            'email' => 'required|max:50|string|email|max:255|min:4|unique:users,email,'.$this->id,
            'phone' => 'required|max:15|min:10|unique:users,email,'.$this->id,
        ];
    }
}
