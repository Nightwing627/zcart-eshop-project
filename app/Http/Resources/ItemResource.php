<?php

namespace App\Http\Resources;

use App\Helpers\ListHelper;
use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'slug' => $this->slug,
            'title' => $this->title,
            'brand' => $this->brand,
            'sku' => $this->sku,
            'condition' => $this->condition,
            'condition_note' => $this->condition_note,
            'description' => $this->description,
            'key_features' => unserialize($this->key_features),
            'stock_quantity' => $this->stock_quantity,
            'price' => $this->sale_price,
            'has_offer' => $this->hasOffer(),
            'offer_price' => $this->offer_price,
            'discount' => trans('theme.percent_off', ['value' => $this->discount_percentage()]),
            'offer_start' => (string) $this->offer_start,
            'offer_end' => (string) $this->offer_end,
            'free_shipping' => $this->free_shipping,
            'shipping_weight' => $this->shipping_weight,
            'min_order_quantity' => $this->min_order_quantity,
            'linked_items' => ListHelper::linked_items($this),
            'stuff_pick' => $this->stuff_pick,
            'feedbacks_count' => $this->feedbacks_count,
            'rating' => $this->feedbacks->avg('rating'),
            'feedbacks' => FeedbackResource::collection($this->whenLoaded('feedbacks')),
            'images' => ImageResource::collection($this->whenLoaded('images')),
            'product' => new ProductResource($this->product),
            'attribute_values' => $this->attributeValues,
            // 'variants' => ListHelper::variants_of_product($this, $this->shop_id),
        ];
    }
}