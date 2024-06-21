<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index()
    {
        if (Auth::guard('web')->check()) {
            $chats  = Chat::where('user_id', Auth::id())->get();
        } else if (Auth::guard('company')->check()){
            $chats = Chat::where('company_id', Auth::id())->get();
        }

        return view('chats.index', compact('chats'));
    }

    public function show(Chat $chat)
    {
        $messages = $chat->messages()->get();
        return view('chats.show', compact('chat', 'messages'));
    }

    public function storeMessage(Request $request, Chat $chat)
    {
        $message = new Message();
        $message->chat_id = $chat->id;
        $message->sender_id = Auth::id();
        $message->sender_type = Auth::guard('web')->check() ? 'user': 'company';
        $message->message = $request->message;
        $message->save();

        return redirect()->route('chat.show', $chat);
     }
}
