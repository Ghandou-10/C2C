<?php

namespace Modules\Chats\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Chats\Entities\Relations\ChatRelations;

class Chat extends Model
{
    use ChatRelations;

    /**
     * @var string[]
     */
    protected $fillable = [
        'data',
        'direct_message'
    ];
    /**
     * @var string[]
     */
    protected $casts = [
        'data'           => 'array',
        'direct_message' => 'boolean',
        'private'        => 'boolean',
    ];

    /**
     * @param $user_id
     * @return bool
     */
    public function isParticipant($user_id)
    {
        $data = $this->participants->where('id', $user_id)->first();
        if (!empty($data)) {
            return true;
        }
        return false;
    }

    /**
     * @param bool $isPrivate
     * @return $this
     */
    public function makePrivate(bool $isPrivate = true)
    {
        $this->private = $isPrivate;
        $this->save();

        return $this;
    }
}
