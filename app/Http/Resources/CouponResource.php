<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CouponResource extends JsonResource
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
            'code' => $this->code,
            'amount' => $this->type == 'amount' ? get_formated_currency($this->value) : get_formated_decimal($this->value) . '%',
            'validity' => $this->validityText(true),
            'starting_time' => $this->starting_time,
            'ending_time' => $this->ending_time,
            'shop' => $this->shop,
        ];
    }
}
