<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }
    public function attributes(): array
    {
        return [
            'title_tr' => __('Turkish-Product Title'),
            'keywords_tr' => __('Turkish-Product Keywords'),
            'description_tr' => __('Turkish-Product Description'),
            'detail_tr' => __('Turkish-Product Detail'),
            'title_en' => __('English-Product Title'),
            'keywords_en' => __('English-Product Keywords'),
            'description_en' => __('English-Product Description'),
            'detail_en' => __('English-Product Detail'),
            'image' => __('Product Image'),
            'price' => __('Product Price'),
            'quantity' => __('Product Quantity'),
            'minquantity' => __('Product Minimum Quantity'),
            'tax' => __('Product Tax'),
            'slug' => __('Product Slug'),
            'sale'=>__('Product Discount'),
        ];
    }

    public function messages(): array
    {
        return [
            'image.max'=>__('Image must be maximum 10000kb '),
            'sale.required_if'=>__('The Product Discount field is required'),
            'title_en.required' =>__('Product Title English is required'),
            'title_tr.required'=>__('Product Title Turkish is required'),
            'keywords_en.required' =>__('Keywords English is required'),
            'keywords_tr.required'=>__('Keywords Turkish is required'),
            'description_tr.required' =>__('Description Turkish is required'),
            'description_en.required'=>__('Description English is required'),
            'detail_tr.required' =>__('Detail English is required'),
            'detail_en.required'=>__('Detail Turkish is required'),
            'image.required' => __('Product Image is required'),
            'price.required' => __('Product Price is required'),
            'quantity.required' => __('Product Quantity is required'),
            'minquantity.required' => __('Product Minimum Quantity is required'),
            'tax.required' => __('Product Tax is required'),
            'slug.required' => __('Product Slug is required'),
            'image.image' => __('Görsel uzantısı jpeg,jpg,png olmalı'),
        ];
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'title_en' => 'required|min:3',
            'keywords_en' => 'required|min:3|max:60',
            'description_en' => 'required|min:5|max:100',
            'detail_en' => 'required|min:5',
            'title_tr' => 'required|min:3',
            'keywords_tr' => 'required|min:3|max:60',
            'description_tr' => 'required|min:5|max:100',
            'detail_tr' => 'required|min:5',
            'image' => 'image|mimes:jpeg,jpg,png|required|max:10000',
            'price' => 'required|min:0',
            'quantity' => 'required|numeric|min:0',
            'minquantity' => 'required|numeric|min:0',
            'tax' => 'required|numeric|min:0',
            'slug' => 'required',
            'sale' => 'required_if:is_sale,Yes',
            'is_sale' => 'nullable',
        ];
    }
}
