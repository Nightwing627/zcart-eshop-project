<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DisputeResource extends JsonResource
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
            'reason' => $this->dispute_type->detail,
            'closed' => $this->isClosed(),
            'description' => $this->description,
            'order_received' => $this->order_received == 1 ? trans('theme.yes') : trans('theme.no'),
            'return_goods' => $this->return_goods == 1 ? trans('theme.yes') : trans('theme.no') ,
            'status' => $this->statusName(true),
            'refund_amount' => get_formated_currency($this->refund_amount),
            'shop' => $this->shop,
            'order_details' => new OrderResource($this->order),
            'attachments' => AttachmentResource::collection($this->attachments),
            'replies' => ReplyResource::collection($this->replies),
            'updated_at' => $this->updated_at->diffForHumans(),
        ];
    }
}