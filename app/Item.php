<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['category_id','name', 'price','quantity', 'path', 'text'];

    public function category_id(){
        return $this->belongsTo('App\categories');
    }

}
