<?php

namespace Modules\Chats\Repositories;

use App\Contracts\CrudRepository;
use Exception;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Modules\Chats\Entities\Chat;
use Modules\Chats\Http\Filters\ChatFilter;

class ChatRepository implements CrudRepository
{
    private ChatFilter $filter;

    /**
     * ChatRepository constructor.
     * @param  ChatFilter  $filter
     */
    public function __construct(ChatFilter $filter)
    {
        $this->filter = $filter;
    }

    /**
     * @return LengthAwarePaginator
     */
    public function all()
    {
        return Chat::filter($this->filter)->paginate(request('perPage'));
    }

    /**
     * @param  array  $data
     * @return Model
     */
    public function create(array $data)
    {
        $chat = Chat::create($data);

        $chat->addAllMediaFromTokens($data['image'] ?? [], 'default');

        return $chat;
    }

    /**
     * @param  mixed  $model
     * @param  array  $data
     * @return Model|Chat|void
     */
    public function update($model, array $data)
    {
        $chat = $this->find($model);

        if (!empty($chat)) {
            $chat->update($data);
        }

        $chat->addAllMediaFromTokens($data['image'] ?? [], 'default');

        return $chat;
    }

    /**
     * @param  mixed  $model
     * @return Model|void
     */
    public function find($model)
    {
        if ($model instanceof Chat) {
            return $model;
        }

        return Chat::findOrFail($model);
    }

    /**
     * @param  mixed  $model
     * @throws Exception
     */
    public function delete($model)
    {
        $this->find($model)->delete();
    }
}
