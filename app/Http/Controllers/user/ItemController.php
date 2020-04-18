<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Item;

class ItemController extends Controller
{
    
    public function index()
    {
        $items = Item::all();
        return view('ecsite.index', compact('items'));
    }

    public function show(Item $item)
    {
        return view('ecsite.show', compact('item'));
    }
}
