<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ConversationResource extends JsonResource
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
            // 'shop' => $this->shop,
            'user' => new UserResource($this->user),
            'customer' => new CustomerResource($this->customer),
            'subject' => $this->subject,
            'message' => $this->message,
            'order_id' => $this->order_id,
            'product' => $this->product,
            'status' => $this->status,
            'label' => $this->label,
            'replies' => ReplyResource::collection($this->replies),
        ];
    }
}
