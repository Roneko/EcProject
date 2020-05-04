<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Sales;
use App\ItemUser;




class SalesController extends Controller
{
    public function index()
    {
        $item_users = ItemUser::where(['purchased',1])->get();
        
        return view('sales.index', ['item_users' => $item_users]);

    }
}
