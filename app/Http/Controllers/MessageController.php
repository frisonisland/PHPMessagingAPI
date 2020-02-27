<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
  public function index(Request $request, $chatId)
  {
    $user = $request->user();
    $messages = DB::table('message')->select('message.*', 'users.name')
                ->where('chatId', $chatId)
                ->join('users', 'users.userId', '=', 'message.userId')
                ->get();

    return ["messages" => $messages];
  }
}
