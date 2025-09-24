<?php

namespace Modules\Chats\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Modules\Accounts\Entities\Admin;
use Modules\Chats\Entities\Chat;

class NewChatStarted implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var Chat
     */
    public Chat $chat;

    /**
     * Create a new event instance.
     */
    public function __construct(Chat $chat)
    {
        $this->chat = $chat;
    }

    /**
     * @return array
     */
    public function broadcastWith(): array
    {
        return ['chat' => $this->chat];
    }

    /**
     * Get the channels the event should be broadcast on.
     */
    public function broadcastOn(): array
    {
        $channels = [];

        foreach (Admin::all() as $admin) {
            $channels[] = new PresenceChannel('user-' . $admin->id);
        }

        return $channels;
    }

    public function broadcastAs()
    {
        return 'new.chat.started';
    }
}
