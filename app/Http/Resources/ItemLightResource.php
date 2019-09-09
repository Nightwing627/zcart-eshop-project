<?php

namespace App\Http\Resources;

use App\Helpers\ListHelper;
use Illuminate\Http\Resources\Json\JsonResource;

class ItemLinghtResource extends JsonResource
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
            'slug' => $this->slug,
            'title' => $this->title,
            'condition' => $this->condition,
            'key_features' => unserialize($this->key_features),
            'stock_quantity' => $this->stock_quantity,
            'has_offer' => $this->hasOffer(),
            'raw_price' => $this->currnt_sale_price(),
            'currency' => get_system_currency(),
            'currency_symbol' => get_currency_symbol(),
            'price' => get_formated_currency($this->sale_price, config('system_settings.decimals', 2)),
            'offer_price' => get_formated_currency($this->offer_price, config('system_settings.decimals', 2)),
            'discount' => trans('theme.percent_off', ['value' => $this->discount_percentage()]),
            'free_shipping' => $this->free_shipping,
            'min_order_quantity' => $this->min_order_quantity,
            'rating' => $this->rating(),
            'image' => get_inventory_img_src($this, 'medium'),
            // 'attribute_values' => $this->attributeValues,
        ];
    }
}