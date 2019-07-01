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
            'dob' => $this->dob,
            'sex' => $this->sex,
            'description' => $this->description,
            'active' => $this->active,
            'accepts_marketing' => $this->accepts_marketing,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'avatar' => (new ImageResource($this->image))->size('small'),
        ];
    }
}
