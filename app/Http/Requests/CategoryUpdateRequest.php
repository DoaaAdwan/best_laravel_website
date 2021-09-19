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

            'name' => 'required',
            // 'image' => 'required|image',
            'url' => 'max:255',
        ];
    }

    public function messages()
    {
        return [

            'name.required' => 'يجب عليك اختيار اسم التصنيف',
            // 'image.required' => ' قم باختيار صورة التصنيف ',
        ];
    }
}
