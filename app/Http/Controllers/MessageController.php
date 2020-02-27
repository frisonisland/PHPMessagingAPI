<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
{
  public function index(Request $request)
  {
    $user = $request->user();
    $address_book = Message::where('ownerId', $user->userId)->pluck('contactId');
    $contacts = DB::table('users')->whereIn('userId', $address_book)->get()->toArray();
    return ["address_book" => $contacts];
  }
}
