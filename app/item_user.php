<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class item_user extends Model
{
    protected $fillable = ['user_id','item_id','quantity','purchased'];
}
