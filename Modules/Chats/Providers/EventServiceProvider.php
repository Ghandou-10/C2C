<?php

namespace Modules\Chats\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Modules\Chats\Events\ChatMessageSent;
use Modules\Chats\Events\ChatMessageStatus;
use Modules\Chats\Events\NewChatStarted;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        ChatMessageSent::class   => [
            //
        ],
        ChatMessageStatus::class => [
            //
        ],
        NewChatStarted::class    => [
            //
        ],
    ];
}
