<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
  protected $hidden =  ['id'];
  protected $visible = ['text'];
}
