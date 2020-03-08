<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ShippingOptionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'shipping_zone_id' => $this->shipping_zone_id,
            'carrier_id' => $this->carrier_id,
            'carrier_name' => $this->carrier_name,
            'cost' => get_formated_currency($this->rate, config('system_settings.decimals', 2)),
            'delivery_takes' => $this->delivery_takes,
        ];
    }
}