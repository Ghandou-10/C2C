<?php

namespace Modules\Chats\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Chats\Entities\Relations\ChatMessagesRelations;

class ChatMessage extends Model
{
    use ChatMessagesRelations;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'message',
        'chat_id',
        'user_id',
        'type',
        'data'
    ];
}
