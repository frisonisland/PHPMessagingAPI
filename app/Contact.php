<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
  protected $hidden = ['userId'];
  protected $visible = ['name', 'status', 'info', 'picture'];
}
