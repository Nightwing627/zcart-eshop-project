<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ShopLightResource extends JsonResource
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
            'slug' => $this->slug,
            'verified' => $this->isVerified(),
            'verified_text' => $this->verifiedText(),
            'rating' => $this->rating(),
            'image' => get_logo_url($this, 'small'),
        ];
    }
}