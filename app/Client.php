<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    public $table = 'oauth_clients';

    public $fillable = ['secret','name','id'];
}
