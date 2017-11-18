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
        $id = Request::segment(count(Request::segments())); //Current model ID

        return [
           'name' => 'required',
           'pin_code' => 'required|composite_unique:gift_cards:'.$id,
           'serial_number' => 'required|composite_unique:gift_cards:'.$id,
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
