<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'Name',
            'surname' => 'Surname',
            'email' => 'Email',
            'phone' => 'Telephone Number',
            'address' => 'Address',
        ];
    }

    public function messages()
    {
        return [
            'phone.numeric'=>'Telephone Number is numeric (0-9)',
            'email.email'=>'Please enter the e-mail address in the correct format.(example@example.com)',

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
            'name' => 'required|min:3',
            'surname' => 'required|min:3',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|digits:11',
            'address' => 'required|min:5|max:100',
        ];
    }
}
