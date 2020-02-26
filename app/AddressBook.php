<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddressBook extends Model
{
    protected $visible = ['contactId'];
    protected $table = 'address_book';
}
