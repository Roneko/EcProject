<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemUser extends Model
{
    protected $fillable = ['user_id','item_id','quantity','purchased','price'];

    protected $table = 'item_users';

    public function item(){
        return $this->belongsTo('App\Item');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}
