<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminUpdateRequest extends FormRequest
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
            'username' => 'required|alpha_dash|string|max:255|min:4|unique:admins,username,'. optional($this->admin)->id,
            'email' => 'required|string|email|max:255|min:4|unique:admins,email,'. optional($this->admin)->id,
            'phone' => 'required|min:10|max:20|unique:admins,phone,'. optional($this->admin)->id,
            'status' => 'required',
        ];
    }
}
