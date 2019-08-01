<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
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
            'nice_name' => $this->nice_name,
            'dob' => date('F j, Y', strtotime($this->dob)),
            'sex' => trans($this->sex),
            'description' => $this->description,
            'active' => $this->active,
            'accepts_marketing' => $this->accepts_marketing,
            'member_since' => $this->created_at->diffForHumans(),
            'avatar' => get_avatar_src($this, 'small'),
            // 'avatar' => (new ImageResource($this->image))->size('small'),
            'api_token' => $this->when(isset($this->api_token), $this->api_token),
        ];
    }
}