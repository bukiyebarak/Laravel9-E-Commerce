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
            'title' => 'Category Title',
            'keywords' => 'Keywords',
            'description' => 'Description',
            'slug' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required'=>'Category Title is required',
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
            'keywords' => 'required|min:3',
            'description' => 'required|min:5|max:100',
            'image' => 'nullable',
            'slug' => 'required',
        ];
    }
}
