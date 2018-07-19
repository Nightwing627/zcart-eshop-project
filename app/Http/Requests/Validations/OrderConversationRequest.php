<?php

namespace App\Http\Requests\Validations;

use App\Customer;
use App\Http\Requests\Request;

class OrderConversationRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->user() instanceof Customer) {
            return $this->route('order')->customer_id == $this->user()->id;
        }
        else{
            return $this->route('order')->shop_id == $this->user()->merchantId();
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // Update the order if goods_received
        if($this->has('goods_received')){
            $order = $this->route('order');
            $order->order_status_id = 6; // Delivered Status. This id is freezed by system config
            $order->goods_received = 1;
            $order->save();
        }

        return [
            'message' => 'required|max:500',
            'photo' => 'mimes:jpg,jpeg,png|max:2000',
        ];
    }
}
