<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required',
            'image' => 'required|image',

            'body' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'عنوان البوست مطلوب',
            'image.required' => 'يرجى إرفاق صورة',
            'body.required'  => 'اكتب المحتوى',
            'image.image' => 'هذا الملف يجب أن يكون صورة'
        ];
    }
}
