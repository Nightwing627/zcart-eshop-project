<?php

namespace App\Http\Requests\Validations;

use App\Http\Requests\Request;

class CreateUserRequest extends Request
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
        $shop_id = Request::user()->merchantId(); //Get current user's shop_id
        Request::merge( array( 'shop_id' => $shop_id ) ); //Set shop_id

        return [
           'name' => 'required|max:255',
           'email' =>  'required|email|max:255|unique:users',
           'password' =>  'required|confirmed|min:6',
           'role_id' => 'required',
           'dob' => 'nullable|date',
           'active' => 'required',
           'image' => 'mimes:jpeg,png',
        ];
    }
}
