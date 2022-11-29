<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageAddRequest extends FormRequest
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
            'title' => 'Image Title',
            'image' => 'Image',
        ];
    }

    public function messages()
    {
        return [
            'title.required'=>'Image Title is required',
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
            'image' => 'image|mimes:jpeg,jpg,png|required|max:10000',
        ];
    }
}
