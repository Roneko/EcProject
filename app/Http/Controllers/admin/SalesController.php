<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ItemUser;




class SalesController extends Controller
{
    public function index()
    {
        $item_users = ItemUser::where('purchased',1)->get();
        $total = ItemUser::where('purchased',1)->sum('price');
        
        return view('sales.index', ['item_users' => $item_users,'total'=>$total]);
    }

    public function cart(){
        $item_users = ItemUser::where('purchased',0)->get();
        return view('sales.carts',['item_users' => $item_users]);
    }
}
