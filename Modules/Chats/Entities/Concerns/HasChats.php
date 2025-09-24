<?php

namespace Modules\Chats\Entities\Concerns;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Modules\Chats\Entities\Chat;

trait HasChats
{
    public function chats(): BelongsToMany
    {
        return $this->belongsToMany(Chat::class, 'chat_users');
    }
}
