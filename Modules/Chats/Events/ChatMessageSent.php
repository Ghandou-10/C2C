<?php

namespace Modules\Chats\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Modules\Chats\Transformers\MessageResource;

class ChatMessageSent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var MessageResource
     */
    public MessageResource $message;

    /**
     * ChatMessageSent constructor.
     * @param MessageResource $message
     */
    public function __construct(MessageResource $message)
    {
        $this->message = $message;
    }

    /**
     * @return MessageResource[]
     */
    public function broadcastWith(): array
    {
        return ['message' => $this->message];
    }

    /**
     * @return PresenceChannel
     */
    public function broadcastOn(): PresenceChannel
    {
        return new PresenceChannel("chat-{$this->message->chat_id}");
    }

    public function broadcastAs()
    {
        return 'new.message';
    }
}
