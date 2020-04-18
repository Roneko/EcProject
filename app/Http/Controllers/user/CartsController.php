<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\item_user;
use Illuminate\Http\Request;
use App\User;
use App\Item;
use Illuminate\Support\Facades\Auth;

class CartsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        $items = Item::all();
        return view('carts.show', compact('items'));
    }

    public function store(Request $request)
    {
        item_user::create([
            'user_id' => Auth::user()->id,
            'item_id' => $request->post('item_id'),
        ],
            ['quantity' => item_user::selectRaw('quantity + ' . $request->post('quantity')),
        ]);
        return redirect('/');
    }
}
