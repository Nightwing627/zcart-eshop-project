<?php

namespace App\Http\Requests\Validations;

use App\Http\Requests\Request;

class CreateOrderRequest extends Request
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
        Request::merge( array( 'order_number' => get_formated_order_number() ) ); //Set order number

        return [
            'cart.*.inventory_id' => 'required',
            'cart.*.item_description' => 'required',
            'cart.*.quantity' => 'required',
            'cart.*.unit_price' => 'required',
            'customer_id' => 'required',
            'order_status_id' => 'required',
            'payment_status_id' => 'required',
            'tax_id' => 'required',
            'billing_address' => 'required',
        ];
    }
}
