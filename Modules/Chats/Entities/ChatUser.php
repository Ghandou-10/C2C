<?php

namespace Modules\Chats\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Chats\Database\factories\ChatUserFactory;

class ChatUser extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
    
    protected static function newFactory(): ChatUserFactory
    {
        //return ChatUserFactory::new();
    }
}
