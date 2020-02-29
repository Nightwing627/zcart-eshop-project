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
            'has_offer' => $this->hasOffer(),
            'raw_price' => $this->currnt_sale_price(),
            'currency' => get_system_currency(),
            'currency_symbol' => get_currency_symbol(),
            'price' => get_formated_currency($this->sale_price, config('system_settings.decimals', 2)),
            'offer_price' => get_formated_currency($this->offer_price, config('system_settings.decimals', 2)),
            'discount' => trans('theme.percent_off', ['value' => $this->discount_percentage()]),
            'offer_start' => (string) $this->offer_start,
            'offer_end' => (string) $this->offer_end,
            'shipping_weight' => get_formated_weight($this->shipping_weight),
            'min_order_quantity' => $this->min_order_quantity,
            'attribute_values' => $this->attributeValues,
            'attributes' => AttributeResource::collection($this->whenLoaded('attributeValues')),
            'images' => ImageResource::collection($this->whenLoaded('images')),
            'feedbacks_count' => $this->feedbacks_count,
            'rating' => $this->rating(),
            'feedbacks' => FeedbackResource::collection($this->whenLoaded('feedbacks')),
            'shop' => new ShopLightResource($this->shop),
            'product' => new ProductResource($this->product),
            'free_shipping' => $this->free_shipping,
            'stuff_pick' => $this->stuff_pick,
            'labels' => $this->getLabels(),
            'linked_items' => ItemLinghtResource::collection(ListHelper::linked_items($this)),
            // 'variants' => ListHelper::variants_of_product($this, $this->shop_id),
        ];
    }
}