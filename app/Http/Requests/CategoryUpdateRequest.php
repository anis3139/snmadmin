<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryUpdateRequest extends FormRequest
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
            'nameBn' => 'required|unique:categories,nameBn,'. optional($this->category)->id,
            'nameEn' => 'required|unique:categories,nameEn,'. optional($this->category)->id,
        ];
    }
}
