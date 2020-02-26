<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactChat extends Model
{
  protected $visible = ['chatId', 'userId'];
  protected $table = 'contact_chat';
}
