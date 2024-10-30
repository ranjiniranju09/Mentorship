<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Events\MessageSent;

class ChatController extends Controller
{
    public function showchat()
    {
        return view('chat');
    }

    public function fetchMessages()
    {
        return Message::with('sender', 'receiver')->get();
    }

    public function sendMessage(Request $request)
    {
        $message = Message::create([
            'sender_id' => $request->sender_id,
            'receiver_id' => $request->receiver_id,
            'message' => $request->message,
        ]);

        broadcast(new MessageSent('$message', '$name'))->toOthers();

        return response()->json(['status' => 'Message Sent!']);
    }
}
