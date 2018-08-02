<?php

namespace App\Http\Requests\Validations;

use App\Http\Requests\Request;

class UpdateGiftCardRequest extends Request
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
           'name' => 'required',
           'value' => 'required|numeric',
           'activation_time' => 'required|nullable|date',
           'expiry_time' => 'required|nullable|date',
           'active' => 'required|boolean',
           'image' => 'mimes:jpg,jpeg,png',
        ];
    }
}
