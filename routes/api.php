<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
use App\Http\Resources\Messages as MessagesResource;
use App\Http\Resources\Contacts as ContactsResource;
use Illuminate\Support\Facades\DB;
use App\Message;
use App\User;

Route::post('/login', 'ApiLoginController@authenticate');

Route::get('/messages/{chatId}', function (Request $request) {

    $item = new Message();
    $item->text = 'Hi';
    $item->id = 1;
    return ["messages" => [new MessagesResource($item)]];
});

Route::get('/contacts', 'AddressBookController@index')->middleware("auth:api");

Route::get('/chats', 'ChatController@index')->middleware("auth:api");
