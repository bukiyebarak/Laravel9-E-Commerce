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
    public function authorize()
    {
        return true;
    }
    public function attributes()
    {
        return [
            'title' => 'Product Title',
            'keywords' => 'Product Keywords',
            'description' => 'Product Description',
            'image' => 'Product Image',
            'detail' => 'Product Detail',
            'price' => 'Product Price',
            'quantity' => 'Product Quantity',
            'minquantity' => 'Product Minimum Quantity',
            'tax' => 'Product Tax',
            'slug' => 'Product Slug',
            'sale'=>'Product Discount',
        ];
    }

    public function messages()
    {
        return [
            'image.max'=>'Image must be maximum 10000kb ',
            'sale.required_if'=>'The Product Discount field is required'
        ];
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|min:3',
            'keywords' => 'required|min:3|max:60',
            'description' => 'required|min:5|max:100',
            'image' => 'image|mimes:jpeg,jpg,png|required|max:10000',
            'detail' => 'required|min:5',
            'price' => 'required|min:0',
            'quantity' => 'required|numeric|min:1',
            'minquantity' => 'required|numeric|min:1',
            'tax' => 'required|numeric|min:0',
            'slug' => 'required',
            'sale' => 'required_if:is_sale,Yes',
            'is_sale' => 'nullable',
        ];
    }
}
