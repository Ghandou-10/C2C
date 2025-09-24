<?php

namespace Modules\Chats\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Accounts\Transformers\CustomerResource;

class ChatResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {
        return [
            'id'             => $this->id,
            'private'        => $this->private,
            'direct_message' => $this->direct_message,
            'created_at'     => $this->created_at,
            'participants'   => CustomerResource::collection($this->participants),
        ];
    }
}
