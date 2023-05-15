<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'title_en' => __('Category Title English'),
            'title_tr'=> __('Category Title Turkish'),
            'keywords_tr'  => __('Keywords Turkish'),
             'keywords_en' => __('Keywords English'),
            'description_tr'  => __('Description Turkish'),
            'description_en' => __('Description English'),
            'detail_tr'  => __('Detail Turkish'),
            'detail_en' => __('Detail English'),
            'slug' => 'Slug',
        ];
    }

    public function messages()
    {
        return [
            'title_en.required' =>__('Category Title English  is required'),
            'title_tr.required'=>__('Category Title Turkish is required'),
            'keywords_en.required' =>__('Keywords  English  is required'),
            'keywords_tr.required'=>__('Keywords  Turkish is required'),
            'description_tr.required' =>__('Description Turkish  is required'),
            'description_en.required'=>__('Description English is required'),
            'detail_tr.required' =>__('Detail English  is required'),
            'detail_en.required'=>__('Detail Turkish is required'),
            'slug.required' =>__('Slug is required'),

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
            'title_tr' => 'required|min:3',
            'keywords_tr' => 'required|min:3',
            'description_tr' => 'required|min:5|max:100',
            'detail_tr' => 'required',
            'title_en' => 'required|min:3',
            'keywords_en' => 'required|min:3',
            'description_en' => 'required|min:5|max:100',
            'detail_en' => 'required',
            'image' => 'nullable',
            'slug' => 'required',

        ];
    }
}
