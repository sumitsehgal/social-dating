<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Message;
use Illuminate\Http\Request;
use Chat;
use Musonza\Chat\Models\Conversation;
use App\User;
use Illuminate\Support\Facades\Auth;

class ConversionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function initiate(Request $request)
    {
        if(!empty($request['friendUserId']))
        {
            $friendUser = User::find($request['friendUserId']);
            $user = Auth::user();

            $conversation = Chat::conversations()->between($friendUser, $user);

            if(empty($conversation))
            {
                // Create New One
                $conversation = Chat::createConversation([$friendUser, $user])->makePrivate();
            }

            return response($conversation);

        }
    }

    public function recentmessages(Request $request, $id)
    {
        $conversation = Conversation::find($id);
        if(!empty($request['friendUserId']))
        {
            $friendUser = User::find($request['friendUserId']);
            // $messages = Chat::conversations($conversation)->for($friendUser)->limit(25)->page(1)->get();
            $messages = Chat::conversation($conversation)->for(auth()->user())->getMessages();
            $lastMessage = !empty($messages->last()) ? $messages->last()->id : null;
            $view = \View::make('elements.recentchat', compact('messages'));

            $contents = $view->render();
    
            return response()->json([
                'html' => $contents,
                'messages' => $messages,
                'lastmessageId' => $lastMessage
            ]);
        }
    }

    public function index()
    {
        $conversations = Chat::conversations()->conversation->all();
        return response($conversations);
    }

    public function store()
    {
        $participants = [auth()->user()->id];
        $conversation = Chat::createConversation($participants);

        return response($conversation);
    }

    public function participants($conversationId)
    {
        $participants = Chat::conversations()->getById($conversationId)->users;

        return response($participants);
    }

    public function join(Request $request, Conversation $conversation)
    {
        Chat::conversation($conversation)->addParticipants(auth()->user());
        return response('');
    }

    public function leaveConversation(Request $request, Conversation $conversation)
    {
        Chat::conversation($conversation)->removeParticipants(auth()->user());
        return response('');
    }

    public function getMessages(Request $request, Conversation $conversation)
    {
        $messages = Chat::conversation($conversation)->for(auth()->user())->getMessages();

        return response($messages);
    }

    public function deleteMessages(Conversation $conversation)
    {
        Chat::conversation($conversation)->for(auth()->user())->clear();
        return response('');
    }

    public function sendMessage(Request $request, $id)
    {
        $conversation = Conversation::find($id);
        $message = Chat::message($request->message)
                  ->from(auth()->user())
                  ->to($conversation)
                  ->send();
        
        $view = \View::make('elements.senderchat', compact('message'));

        $contents = $view->render();

        return response()->json([
            'html' => $contents,
            'message' => $message
        ]);
    }

    public function retrieveMessages(Request $request, $conversation)
    {
        $conversation = Conversation::find($conversation);
        $messages = $conversation->messages();
        if(!empty($request['messageId']))
        {
            $messages = $messages->where('mc_messages.id', '>', $request['messageId']);
        }
        $messages = $messages->get();

        $lastMessage = !empty($messages->last()) ? $messages->last()->id : null;

        $view = \View::make('elements.recievechat', compact('messages'));

        $contents = $view->render();

        return response()->json([
            'html' => $contents,
            'message' => $messages,
            'lastmessageId' => $lastMessage
        ]);

    }

    public function readAll(Request $request, $convId)
    {
        $conversation = Conversation::find($convId);
        Chat::conversation($conversation)->for(auth()->user())->readAll();
        return response()->json([
            'status' => true,
        ]);

    }

    public function getallunread(Request $request)
    {
        $totalUnread = Chat::messages()->for(auth()->user())->unreadCount();
        $cs = auth()->user()->conversations;

        $view = \View::make('elements.navupper', compact('cs'));

        $contents = $view->render();

        return response()->json([
            'html' => $contents,
            'totalUnread' => $totalUnread
        ]);

    }

}
