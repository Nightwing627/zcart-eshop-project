<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FeedbackResource extends JsonResource
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
            'rating' => $this->rating,
            'comment' => $this->comment,
            'verified_purchase' => true,
            'approved' => $this->approved,
            'spam' => $this->spam,
            'updated_at' => $this->updated_at->diffForHumans(),
            'customer' => [
                'id' => $this->customer->id,
                'name' => $this->customer->getName(),
                'avatar' => get_avatar_src($this->customer, 'tiny'),
            ],
        ];
    }
}