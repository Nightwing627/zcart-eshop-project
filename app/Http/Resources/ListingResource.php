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
            'sale_price' => $this->sale_price,
            'offer_price' => $this->offer_price,
            'offer_start' => (string) $this->offer_start,
            'offer_end' => (string) $this->offer_end,
            'stuff_pick' => $this->stuff_pick,
            'hot_item' => $this->orders_count >= config('system.popular.hot_item.sell_count', 3) ? true : false,
            'rating' => $this->feedbacks->avg('rating'),
            'feedbacks' => $this->feedbacks,
            'image' => (new ImageResource($this->image))->size('medium'),
        ];
    }
}
