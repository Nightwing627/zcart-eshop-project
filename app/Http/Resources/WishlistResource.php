<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WishlistResource extends JsonResource
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
            'listing_id' => $this->inventory_id,
            'product_id' => $this->product_id,
            'slug' => $this->inventory->slug,
            'title' => $this->inventory->title,
            'condition' => $this->inventory->condition,
            'price' => $this->inventory->sale_price,
            'has_offer' => $this->inventory->hasOffer(),
            'offer_price' => $this->inventory->offer_price,
            'discount' => trans('theme.percent_off', ['value' => $this->inventory->discount_percentage()]),
            'offer_start' => (string) $this->inventory->offer_start,
            'offer_end' => (string) $this->inventory->offer_end,
            'stuff_pick' => $this->inventory->stuff_pick,
            'free_shipping' => $this->inventory->free_shipping,
            'hot_item' => $this->inventory->orders_count >= config('system.popular.hot_item.sell_count', 3) ? true : false,
            'rating' => $this->inventory->feedbacks->avg('rating'),
            'image' => get_inventory_img_src($this->inventory, 'small'),
        ];
    }
}