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
            'attributes' => AttributeResource::collection($this->attributeValues),
            'price' => $this->sale_price,
            'has_offer' => $this->hasOffer(),
            'offer_price' => $this->offer_price,
            'discount' => trans('theme.percent_off', ['value' => $this->discount_percentage()]),
            'offer_start' => (string) $this->offer_start,
            'offer_end' => (string) $this->offer_end,
            'stuff_pick' => $this->stuff_pick,
            'free_shipping' => $this->free_shipping,
            'hot_item' => $this->orders_count >= config('system.popular.hot_item.sell_count', 3) ? true : false,
            // 'image' => (new ImageResource($this->image))->size('medium'),
            'image' => get_inventory_img_src($this, 'medium'),
            'rating' => $this->feedbacks->avg('rating'),
            'feedbacks' => FeedbackResource::collection($this->feedbacks),
        ];
    }
}