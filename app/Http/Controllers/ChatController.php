<?php

namespace App\Http\Controllers;

use App\Events\ChatMessageSent;
use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index()
    {
        $users = User::where('id', '!=', Auth::id())->get();

        return view('admin.chat.index', [
            'users' => $users,
        ]);
    }

    public function getMessages($userId)
    {
        $messages = Chat::where(function ($query) use ($userId) {
            $query->where('from_user_id', Auth::id())
                ->where('to_user_id', $userId);
        })->orWhere(function ($query) use ($userId) {
            $query->where('from_user_id', $userId)
                ->where('to_user_id', Auth::id());
        })
            ->with(['sender', 'receiver'])
            ->orderBy('created_at', 'asc')
            ->get();

        return response()->json($messages);
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'message' => 'required|string|max:1000',
        ]);

        $chat = Chat::create([
            'from_user_id' => Auth::id(),
            'to_user_id' => $request->receiver_id,
            'message' => $request->message,
        ]);

        $chat->load('sender');

        broadcast(new ChatMessageSent($chat))->toOthers();

        return response()->json([
            'success' => true,
            'message' => $chat,
        ]);
    }
}