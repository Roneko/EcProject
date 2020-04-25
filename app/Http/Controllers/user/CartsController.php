<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\ItemUser;
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
    
    public function store(Request $request)
    {
        $item = Item::find($request->post('item_id')); //findメソッドで商品取得
        $quantity = $item->quantity-$request->quantity; //在庫引いてる
        
        if($quantity>=0)
        {
            ItemUser::create([
                'user_id' => Auth::user()->id,
                'item_id' => $request->post('item_id'),
                'quantity' => $request->quantity,
                'number' => $request->quantity,
                'purchased' => false,
                ]);
                $item->update(['quantity' => $quantity]); //quantityの在庫を更新してる
                return redirect('/ecsite'); //画面作りなさい
            }else{
                return redirect('/ecsite')
                ->with('message', __('在庫がありません。'));
        }
    }
        
    public function show()
    {
        $item_users = ItemUser::where([['user_id',1],['purchased',0]])->get();
        
            //在庫表示させたい

        return view('carts.show', ['item_users' => $item_users]);
    }

    public function destroy(ItemUser $itemUser,Item $item)
    {
        $item->delete();

        ItemUser::updating(
            $quantity = $item->quantity + $itemUser->quantity,
            $item->update(['quantity' => $quantity]),
        );
        //item_userのquantityを削除させつつ、削除した個数分itemテーブルのquantityを増やしたい、できないーー
        return redirect('/users/{user_id}')->with('flash_message', 'カートから削除しました');
    }

}

