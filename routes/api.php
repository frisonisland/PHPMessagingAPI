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
use App\Message;
use App\Contact;
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/messages', function (Request $request) {
    $item = new Message();
    $item->text = 'Hi';
    $item->id = 1;
    return new MessagesResource($item);
});

Route::get('/contacts', function (Request $request) {
    $item = new Contact();
    $item->userId = 1;
    $item->name = "Test user";
    $item->status = true;
    $item->info = "Hello there";
    $item->picture = "avatar.png";
    return new ContactsResource($item);
});
