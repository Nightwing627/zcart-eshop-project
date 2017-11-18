<?php

namespace App\Http\Requests\Validations;

use App\Http\Requests\Request;

class UpdateCouponRequest extends Request
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

        // echo "<pre>"; print_r(Request::all()); echo "</pre>"; exit();
        return [
           'name' => 'required',
           'code' => 'required|composite_unique:coupons,shop_id:'.$shop_id.', '.$id,
           'value' => 'required|numeric',
           'type' => 'required',
           'quantity' => 'required|integer',
           'min_order_amount' => 'nullable|numeric',
           'quantity_per_customer' => 'nullable|integer',
           'starting_time' => 'required|nullable|date|after_or_equal:now',
           'ending_time' => 'required|nullable|date|after:starting_time',
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
            'starting_time.after_or_equal' => trans('validation.offer_start_after'),
            'ending_time.after' => trans('validation.offer_end_after'),
        ];
    }

}
