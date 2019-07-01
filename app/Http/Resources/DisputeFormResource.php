<?php

namespace App\Http\Resources;

use App\DisputeType;
use Illuminate\Http\Resources\Json\JsonResource;

class DisputeFormResource extends JsonResource
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
            'order_number' => $this->order_number,
            'order_status' => $this->orderStatus(True),
            'total' => $this->total,
            'grand_total' => $this->grand_total,
            'items' => $this->inventories->pluck('title','id'),
            'dispute_type' => DisputeType::orderBy('id')->pluck('detail','id'),
        ];
    }
}