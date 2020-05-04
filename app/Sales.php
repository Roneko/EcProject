<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{

    protected $table = 'item_users';

    public function item_users(){
        return $this->hasMany('App\ItemUser');
    }
}
