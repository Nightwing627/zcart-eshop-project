<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ListingResource extends JsonResource
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
            'attributes' => AttributeResource::collection($this->whenLoaded('attributeValues')),
            'has_offer' => $this->hasOffer(),
            'raw_price' => $this->currnt_sale_price(),
            'currency' => get_system_currency(),
            'currency_symbol' => get_currency_symbol(),
            'price' => get_formated_currency($this->sale_price, config('system_settings.decimals', 2)),
            'offer_price' => get_formated_currency($this->offer_price, config('system_settings.decimals', 2)),
            'discount' => trans('theme.percent_off', ['value' => $this->discount_percentage()]),
            'offer_start' => (string) $this->offer_start,
            'offer_end' => (string) $this->offer_end,
            'stuff_pick' => $this->stuff_pick,
            'free_shipping' => $this->free_shipping,
            'hot_item' => $this->orders_count >= config('system.popular.hot_item.sell_count', 3) ? true : false,
            'image' => get_inventory_img_src($this, 'medium'),
            'rating' => $this->feedbacks->avg('rating'),
            // 'feedbacks' => FeedbackResource::collection($this->whenLoaded('feedbacks')),
        ];
    }
}