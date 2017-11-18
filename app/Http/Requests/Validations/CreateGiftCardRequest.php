<?php

namespace App\Http\Requests\Validations;

use App\Http\Requests\Request;

class CreateGiftCardRequest extends Request
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
           'pin_code' => 'required|unique:gift_cards',
           'serial_number' => 'required|unique:gift_cards',
           'value' => 'required|numeric',
           'activation_time' => 'required|nullable|date|after_or_equal:now',
           'expiry_time' => 'required|nullable|date|after:starting_time',
           'active' => 'required|boolean',
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
            'activation_time.after_or_equal' => trans('validation.offer_start_after'),
            'expiry_time.after' => trans('validation.offer_end_after'),
        ];
    }

}
