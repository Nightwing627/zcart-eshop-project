<?php

namespace App\Http\Requests\Validations;

use Auth;
use Hash;
use Validator;
use App\Http\Requests\Request;

class SelfPasswordUpdateRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::guard('customer')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        Validator::extend('check_current_password', function($attribute, $value, $parameters){
            return Hash::check($value, Auth::guard('customer')->user()->password);
        });

        return [
            'current_password' =>  'required|check_current_password',
            'password' =>  'required|confirmed|min:6',
            'password_confirmation' => 'required',
        ];
    }

   /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'current_password.check_current_password' => trans('theme.validation.incorrect_current_password'),
        ];
    }
}
