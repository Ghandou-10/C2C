<?php

namespace Modules\Chats\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Accounts\Transformers\CustomerResource;

class MessageResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {
        return [
            'id'         => $this->id,
            'message'    => $this->message,
            'chat_id'    => $this->chat_id,
            'user_id'    => $this->user_id,
            'data'       => json_decode($this->data),
            'created_at' => $this->created_at,
            'sender'     => new CustomerResource($this->sender),
        ];
    }
}
