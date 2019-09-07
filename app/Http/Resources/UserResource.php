<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'name' => $this->getName(),
            'email' => $this->email,
            'avatar' => get_avatar_src($this, 'small'),
            'member_since' => date('F j, Y', strtotime($this->created_at)),
            // 'image' => (new ImageResource($this->image))->size('small'),
        ];
    }
}