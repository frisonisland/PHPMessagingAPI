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
use App\Message;
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/messages', function (Request $request) {
    $item = new Message();
    $item->text = 'Hi';
    $item->id = 1;
    return new MessagesResource($item);
});
