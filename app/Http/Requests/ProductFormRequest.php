<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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

                'name' => 'required|unique:products,name|max:255',
                'short_description' => 'required',
                'description' => 'required',
                'regular_price' => 'required',
                // 'sale_price' => 'required',
                'status_id' => 'required',
                'featured_id' => 'required',
                'popular_id' => 'required',
                'newArrival_id' => 'required',
                'quantity' => 'required',
                'product_image' => 'required|image',
                // 'size' => 'required',
                'category_id' => 'required',



        ];
    }

    public function messages()
    {
        return [

            'name.required' => 'يجب عليك اختيار اسم المنتج',
            'name.unique' =>'هذا الاسم موجود قم بإدخال اسم آخر ',
            'product_image.required' => ' قم باختيار صورة المنتج ',
            'short_description.required'  => 'أدخل وصف قصير للمنتج',
            'description.required'  => 'أدخل وصف للمنتج',
            'regular_price.required'  => 'أدخل سعر المنتج',
            'status_id.required' => 'اختر حالة المنتج',
            'featured_id.required' => 'حدد هل المنتج مميز أم لا؟ ',
            'popular_id.required' => 'حدد هل هذا المنتج من المنتجات الأكثر شعبية أم لا ؟',
            'newArrival_id.required' => 'حدد هل هذا المنتج وصل حديثاً أم لا ؟ ',
            'quantity.required' => 'اختر كمية المنتج',
            'category_id.required' => 'اختر تصنيف المنتج',
            // 'slug.required' => 'اسم المنتج هذا موجود من قبل',
        ];
    }
}
