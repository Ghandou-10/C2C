<?php

namespace Modules\Chats\Http\Controllers\Api;

use App\Support\Traits\ApiTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use JsonException;
use Modules\Accounts\Entities\User;
use Modules\Accounts\Transformers\CustomerResource;
use Modules\Chats\Entities\Chat;
use Modules\Chats\Entities\ChatMessage;
use Modules\Chats\Events\ChatMessageSent;
use Modules\Chats\Events\ChatMessageStatus;
use Modules\Chats\Events\NewChatStarted;
use Modules\Chats\Http\Requests\CreateChatRequest;
use Modules\Chats\Http\Requests\SendTextMessageRequest;
use Modules\Chats\Transformers\ChatResource;
use Modules\Chats\Transformers\MessageResource;

class ChatController extends Controller
{
    use AuthorizesRequests, ValidatesRequests, ApiTrait;

    /**
     * @param  CreateChatRequest  $request
     * @return JsonResponse
     */
    public function createChat(CreateChatRequest $request)
    {
        $users = $request->users;

        // check if they had a chat before
        $chat = $request->user()->chats()->whereHas('participants', function ($q) use ($users) {
            $q->where('user_id', $users[0]);
        })->first();

        //if not, create a new one
        if (empty($chat)) {
            $users[] = $request->user()->id;
            $chat = Chat::create()->makePrivate($request->isPrivate);
            $chat->participants()->attach($users);

            //triggering the event
            broadcast(new NewChatStarted($chat));
        }

        $success = true;
        return response()->json([
            'chat'    => new ChatResource($chat),
            'success' => $success
        ], 200);
    }

    /**
     * @param  Request  $request
     * @return JsonResponse
     */
    public function getChats(Request $request)
    {
        $user = $request->user();
        $chats = $user->chats()->with('participants')->get();
        $success = true;
        return response()->json([
            'chats'   => ChatResource::collection($chats),
            'success' => $success
        ], 200);
    }

    /**
     * @param  SendTextMessageRequest  $request
     * @return JsonResponse
     * @throws JsonException
     */
    public function sendTextMessage(SendTextMessageRequest $request)
    {
        $chat = Chat::find($request->chat_id);
        if ($chat->isParticipant($request->user()->id)) {
            $message = ChatMessage::create([
                'message' => $request->message,
                'chat_id' => $request->chat_id,
                'user_id' => $request->user()->id,
                'data'    => json_encode([
                    'seenBy' => [],
                    'status' => 'sent'
                ], JSON_THROW_ON_ERROR)
                //status = sent, delivered,seen
            ]);
            $success = true;
            $message = new MessageResource($message);

            // broadcast the message to all users
            broadcast(new ChatMessageSent($message));

            //            foreach ($chat->participants as $participant) {
            //                if ($participant->id != $request->user()->id) {
            //                    $participant->notify(new NewMessage($message));
            //                }
            //            }

            return response()->json([
                "message" => $message,
                "success" => $success
            ], 200);
        }

        return response()->json([
            'message' => 'not found'
        ], 404);
    }

    /**
     * @param  Request  $request
     * @param  ChatMessage  $message
     * @return JsonResponse
     * @throws JsonException
     */
    public function messageStatus(Request $request, ChatMessage $message)
    {
        if ($message->chat->isParticipant($request->user()->id)) {
            $messageData = json_decode($message->data);
            $messageData->seenBy[] = $request->user()->id;
            $messageData->seenBy = array_unique($messageData->seenBy);

            //Check if all participant have seen or not
            if (count($message->chat->participants) - 1 < count($messageData->seenBy)) {
                $messageData->status = 'delivered';
            } else {
                $messageData->status = 'seen';
            }
            $message->data = json_encode($messageData);
            $message->save();
            $message = new MessageResource($message);

            //triggering the event
            broadcast(new ChatMessageStatus($message));

            return response()->json([
                'message' => $message,
                'success' => true
            ], 200);
        }

        return response()->json([
            'message' => 'Not found',
            'success' => false
        ], 404);
    }

    /**
     * @param  Chat  $chat
     * @param  Request  $request
     * @return JsonResponse
     */
    public function getChatById(Chat $chat, Request $request)
    {
        if ($chat->isParticipant($request->user()->id)) {
            $messages = $chat->messages()->with('sender')->orderBy('created_at', 'asc')->get();
            return response()->json([
                'chat'     => new ChatResource($chat),
                'messages' => MessageResource::collection($messages)
            ], 200);
        }

        return response()->json([
            'message' => 'not found'
        ], 404);
    }

    /**
     * @param  Request  $request
     * @return JsonResponse
     */
    public function searchUsers(Request $request)
    {
        $users = User::where('email', 'like', "%{$request->email}%")->limit(3)->get();
        return response()->json([
            'users' => CustomerResource::collection($users),
        ], 200);
    }
}
