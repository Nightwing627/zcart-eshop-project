<?php

namespace App\Http\Requests\Validations;

use App\Http\Requests\Request;

class CreateMerchantRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Request::user()->isFromPlatform();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        Request::merge(['role_id' => \App\Role::MERCHANT]); //Set role_id

        return [
           'name' => 'required|max:255',
           'email' =>  'required|email|max:255|unique:users',
           'password' =>  'required|confirmed|min:6',
           'dob' => 'nullable|date',
           'active' => 'required',
           'image' => 'mimes:jpeg,png',
        ];
    }
}
