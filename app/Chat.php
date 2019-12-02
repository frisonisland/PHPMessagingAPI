<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
  protected $hidden = ['chatId'];
  protected $visible	= ['name','contacts'];
}
