<?php

namespace App\Http\Requests\Validations;

use App\Http\Requests\Request;

class CheckoutCartRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return crosscheckCartOwnership($this, $this->route('cart'));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'email' =>  'required|email|max:255|unique:customers',
            'password' =>  'nullable|required_with:create-account|confirmed|min:6',
        ];

        if( 'saved_card' != $this->payment_method )
            $rules['payment_method'] = ['required', 'exists:payment_methods,id,enabled,1'];

        return $rules;
    }
}
