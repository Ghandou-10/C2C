<?php

namespace Modules\Chats\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Chats\Entities\Chat;
use Modules\Chats\Entities\ChatRoom;

class ChatsDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->seed($this->chats());
    }

    /**
     * Run the database seeds.
     *
     * @param array $chats
     * @return void
     */
    public function seed(array $chats = []): void
    {
//        foreach ($chats as $chat) {
//            $data = Arr::except($chat, ['image']);
//
//            $model = Chat::create($data);
//        }
    }

    private function chats()
    {
        return [
            [
                'sender_id'   => 1,
                'receiver_id' => 2,
                'message'     => 'hi, how are you',
            ],
            [
                'sender_id'   => 2,
                'receiver_id' => 1,
                'message'     => 'fine, and you',
            ],
        ];
    }
}
