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
    //get all chatId where user is in
    $contact_chats = ContactChat::where('userId', $user->userId)->pluck('chatId');
    //get chats and number of partecipants
    $contact_chats = DB::table('contact_chat')->
                      select('chatId', DB::raw("count(userId) as partecipants"))->
                      where('userId', $user->userId)->
                      groupBy('chatId')->get()->toArray();
    $response_array = [];
    foreach ($contact_chats as $cur) {
      //error_log(print_r($cur));
      if ($cur->partecipants > 2)
      {
        $obj = Chat::where('chatId', $cur->chatId)->first();
      }
      else
      {
        //get the other user of 'one to one' chats (partecipants equal to 2 or less)
        $obj_u = DB::table('contact_chat')->
                  select('contact_chat.chatId as chatId',
                        'users.name as chatName')->
                  where('chatId', $cur->chatId)->
                  where('users.userId', '!=',$user->userId)->
                  join('users', 'users.userId', '=', 'contact_chat.userId')->
                  first();
        //error_log(print_r($obj_u));
      }
      array_push($response_array, $obj_u);
    }
    //if chat is group get group name and image
    //else, if is a chat between two, get other user info
    return ["chats" => $response_array];
  }
}
