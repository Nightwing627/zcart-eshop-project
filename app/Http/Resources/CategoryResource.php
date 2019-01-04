<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
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
            'category_sub_group_id' => $this->category_sub_group_id,
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'featured' => $this->featured,
        ];
    }
}
