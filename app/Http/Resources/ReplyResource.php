<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReplyResource extends JsonResource
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
            'reply' => $this->reply,
            'user' => new UserResource($this->user),
            'customer' => new CustomerResource($this->customer),
            'read' => $this->read,
            'attachments' => AttachmentResource::collection($this->attachments),
            'updated_at' => $this->updated_at->diffForHumans(),
        ];
    }
}
