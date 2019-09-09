<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderItemResource extends JsonResource
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
            'pivot' => $this->when(isset($this->pivot), [
                // 'inventory_id' => $this->pivot->inventory_id,
                'item_description' => $this->pivot->item_description,
                'quantity' => $this->pivot->quantity,
                'unit_price' => get_formated_currency($this->pivot->unit_price, config('system_settings.decimals', 2)),
                'total' => get_formated_currency($this->pivot->unit_price * $this->pivot->quantity, config('system_settings.decimals', 2)),
                'image' => get_inventory_img_src($this, 'medium'),
                // 'feedback_id' => $this->pivot->feedback_id,
                // 'created_at' => date('F j, Y', strtotime($this->created_at)),
                // 'updated_at' => date('F j, Y', strtotime($this->updated_at)),
            ]),
        ];
    }
}