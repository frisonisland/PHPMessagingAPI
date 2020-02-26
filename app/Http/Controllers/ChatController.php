<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chat;
use App\User;
use App\ContactChat;
use App\Http\Resources\Chats as ChatsResource;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
  public function index(Request $request)
  {
    $user = $request->user();
    $contact_chat = ContactChat::where('userId', $user->userId)->pluck('chatId');
    $chats = Chat::whereIn('chatId', $contact_chat)->get()->toArray();
    return ["chats" => $chats];
  }
}
