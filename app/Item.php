<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['category_id','name', 'price','quantity', 'path', 'text'];

    public function category(){
        return $this->belongsTo('App\category');
    }
    public function item_users(){
        return $this->hasMany('App\item_user');
    }
}
