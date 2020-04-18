<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class item_user extends Model
{
    protected $fillable = ['user_id','item_id','quantity','purchased'];

    public function item(){
        return $this->belongsTo('App\Item');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}
