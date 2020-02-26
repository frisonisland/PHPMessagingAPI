<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Chat;
use App\User;
use App\AddressBook;
use App\Http\Resources\Chats as ChatsResource;
use Illuminate\Support\Facades\DB;

class AddressBookController extends Controller
{
  public function index()
  {
    $user = DB::table('users')->where('email', 'frisonisland@gmail.com')->first();
    $address_book = AddressBook::where('ownerId', $user->userId)->pluck('contactId');
    $contacts = DB::table('users')->whereIn('userId', $address_book)->get()->toArray();
    return ["address_book" => $contacts];
  }
}
