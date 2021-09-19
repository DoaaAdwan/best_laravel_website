<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderFormRequest extends FormRequest
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

                'size_id' => 'required',
                'quantity' => 'required|max:255',
                'address' => 'required|max:255',
                'phone' => 'required|max:255',
        ];
    }

    public function messages()
{
    return [
        'size_id.required' => 'يجب عليك اختيارالحجم',
        'quantity.required' => 'حدد الكمية التي تريدها',
        'address.required'  => 'أدخل عنوانك',
        'phone.required'  => 'أدخل رقم جوالك لنتمكن من التواصل معك',
    ];
}
}
