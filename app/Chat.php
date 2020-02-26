<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
  protected $visible	= ['chatId','chatName','chatPicture'];
  protected $table = 'chat';
}
