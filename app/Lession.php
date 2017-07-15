<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lession extends Model
{
    //
    public $fillable = ['title','body'];
    public $hidden = ['updated_at'];
}
