<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
  protected $visible = ['chatId','userId','message'];
  protected $table = 'message';
}
