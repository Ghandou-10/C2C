<?php

namespace Modules\Chats\Entities\Relations;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Accounts\Entities\User;
use Modules\Chats\Entities\Chat;

trait ChatMessagesRelations
{
    /**
     * @return BelongsTo
     */
    public function chat(): BelongsTo
    {
        return $this->belongsTo(Chat::class);
    }

    /**
     * @return BelongsTo
     */
    public function sender(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
