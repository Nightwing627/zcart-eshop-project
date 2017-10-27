<?php

namespace App\Http\Requests\Validations;

use App\Http\Requests\Request;

class CreateCustomerRequest extends Request
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
           'name' => 'required|max:255',
           'email' =>  'required|email|max:255|unique:customers',
           'password' =>  'required|confirmed|min:6',
           'dob' => 'nullable|date',
           'active' => 'required',
           'avatar' => 'mimes:jpg,jpeg,png',
        ];
    }
}
