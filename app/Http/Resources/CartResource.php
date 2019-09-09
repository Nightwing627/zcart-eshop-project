<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
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
            'customer_id' => $this->customer_id,
            'ip_address' => $this->ip_address,
            'ship_to' => $this->ship_to,
            'shipping_zone_id' => $this->shipping_zone_id,
            'shipping_rate_id' => $this->shipping_rate_id,
            'shipping_address' => $this->shipping_address,
            'billing_address' => $this->billing_address,
            'shipping_weight' => get_formated_weight($this->shipping_weight),
            'packaging_id' => $this->packaging_id,
            // 'coupon_id' => $this->coupon_id,
            'coupon' => $this->coupon,
            'total' => get_formated_currency($this->total, config('system_settings.decimals', 2)),
            'shipping' => get_formated_currency($this->shipping, config('system_settings.decimals', 2)),
            'packaging' => get_formated_currency($this->packaging, config('system_settings.decimals', 2)),
            'handling' => get_formated_currency($this->handling, config('system_settings.decimals', 2)),
            'taxrate' => $this->taxrate,
            'taxes' => get_formated_currency($this->taxes, config('system_settings.decimals', 2)),
            'discount' => get_formated_currency($this->discount, config('system_settings.decimals', 2)),
            'grand_total' => get_formated_currency($this->grand_total, config('system_settings.decimals', 2)),
            'shop' => new ShopLightResource($this->shop),
            'items' => OrderItemResource::collection($this->inventories),
            // 'shop' => new ShopResource($this->shop),
            // 'items' => ItemResource::collection($this->inventories),
        ];
    }
}