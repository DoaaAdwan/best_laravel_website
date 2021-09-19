<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
            'title' => 'required|max:255',
            'subtitle' => 'required',
            'image' => 'required|image',
            // 'status' => 'required|boolean',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'العنوان الرئيسي لهذا السلايدر مطلوب',
            'subtitle.required' => 'العنوان الفرعي لهذا السلايدر مطلوب',
            'image.required' => 'الرجاء إرفاق صورة',
            'image.image' => 'هذا الملف يجب أن يكون صورة',
            // 'status.required' => 'يجب اختيار حالة للسلايدر',
        ];
    }
}
