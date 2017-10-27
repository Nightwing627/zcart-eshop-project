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
        $shop_id = Request::user()->shop_id; //Get current user's shop_id
        $id = Request::segment(count(Request::segments())); //Current model ID
        Request::merge( array( 'shop_id' => $shop_id ) ); //Set shop_id

        return [
           'name' => 'required',
           'pin_code' => 'required|composite_unique:gift_cards,shop_id:'.$shop_id.', '.$id,
           'serial_number' => 'required|composite_unique:gift_cards,shop_id:'.$shop_id.', '.$id,
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
