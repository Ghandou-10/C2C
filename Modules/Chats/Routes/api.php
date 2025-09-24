<?php

use Modules\Chats\Http\Controllers\Api\ChatController;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/chat/get-chats', [
        ChatController::class,
        'getChats'
    ])->name('chat.get-chats');
    Route::post('/chat/create-chat', [
        ChatController::class,
        'createChat'
    ])->name('chat.create-chat');
    Route::get('/chat/get-chat-by-id/{chat}', [
        ChatController::class,
        'getChatById'
    ])->name('chat.get-single-chat');
    Route::post('/chat/send-text-message', [
        ChatController::class,
        'sendTextMessage'
    ])->name('chat.send-message');
    Route::post('/chat/search-user', [
        ChatController::class,
        'searchUsers'
    ])->name('chat.search_users');
    Route::get('/chat/message-status/{message}', [
        ChatController::class,
        'messageStatus'
    ])->name('chat.message-status');
});
