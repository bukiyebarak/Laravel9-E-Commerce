<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
            'city' => 'City',
            'district' => 'District',
            'neighbourhood' => 'Neighbourhood',
            'zipcode' => 'Zipcode',
            'payment'=>'Payment',
        ];
    }

    public function messages()
    {
        return [
            'phone.numeric'=>'Telephone Number is numeric (0-9)',
            'email.email'=>'Please enter the e-mail address in the correct format.(example@example.com)',
            'payment.required'=>'Please choose the payment method.',
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
            'phone' => 'required|numeric|min:10',
            'address' => 'required|min:5|max:100',
            'city' => 'required',
            'district' => 'required',
            'neighbourhood' => 'required',
            'zipcode' => 'required|numeric|integer|size:5',
            'payment'=>'required',
        ];
    }
}
