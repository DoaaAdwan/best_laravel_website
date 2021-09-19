<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PartnerRequest extends FormRequest
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
            'name' => 'required|max:255',
            'info' => 'required',
            'image' => 'required|image',
            'facebook_link' => 'required|url',
            'instgram_link' => 'url',

        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'اسم المعرض مطلوب',
            'info.required' => 'الرجاء إدخال معلومات عن المعرض',
            'image.required' => 'الرجاء إرفاق صورة',
            'image.image' => 'هذا الملف يجب أن يكون صورة',
            'facebook_link.required' => 'رابط الفيسبوك مطلوب',
            'facebook_link.url' => ' هذا الرابط غير صالح',
            'instgram_link.url' => 'هذا الرابط غير صالح',

        ];
    }
}
