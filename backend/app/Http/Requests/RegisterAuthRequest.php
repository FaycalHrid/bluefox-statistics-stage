<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterAuthRequest extends FormRequest
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
            'firstName' => 'required|string|max:100',
            'lastName' => 'required|string|max:100',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:6|max:100',
            'gender' => 'required|integer',
            'birthday' => 'required|date|date_format:Y-m-d',
            'validPhoneNumber' => 'required|integer',
            'splitGp' => 'required|integer',
            'refSupplier' => 'required|string|max:20',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Error, you forgot your email address!',
            'email.unique' => 'Email already taken, tank you try with an author address',
            'validPhoneNumber.required' => 'Error, you forgot your validPhoneNumber',
        ];
    }
}