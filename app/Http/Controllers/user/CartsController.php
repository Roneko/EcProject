<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\ItemUser;
use Illuminate\Http\Request;
use App\User;
use App\Item;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CartUpdateRequest;


class CartsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function store(Request $request)
    {
        $item = Item::find($request->item_id); //findメソッドで商品取得
        $quantity = $item->quantity-$request->quantity; //在庫引いてる        

        if($quantity>=0)
        {
            if(ItemUser::where([['user_id',Auth::id()],['item_id',$item->id],['purchased',0]])->exists())//カートに入れてたらtrueなかったらfalse
            {
                $item_user = ItemUser::where([['user_id',Auth::id()],['item_id',$item->id],['purchased',0]])->first();
                $item_user->quantity += $request->quantity;
                $item_user->price += $item->price*$request->quantity;
                $item_user->save();

            }else{
                 //カートにitemが何も入ってない時の処理
            ItemUser::create([
                'user_id' => Auth::user()->id,
                'item_id' => $item->id,
                'quantity' => $request->quantity,
                'price' => $item->price*$request->quantity,
                'purchased' => false,
                ]);
            }
                $item->update(['quantity' => $quantity]); //quantityの在庫を更新してる
                return redirect('/ecsite'); //画面作りなさい
            }else{
                return redirect('/ecsite')
                ->with('message', __('在庫がありません。'));
        }
    }
        
    public function show()
    {
        $item_users = ItemUser::where([['user_id',Auth::id()],['purchased',0]])->get();
        $total = 0;
        foreach($item_users as $item_user){
            $total += $item_user->item->price*$item_user->quantity;//価格計算
        }

        return view('carts.show', ['item_users' => $item_users , 'total'=> $total]);
    }

    public function update(CartUpdateRequest $request, ItemUser $item_user){
        $quantity = $item_user->quantity-$request->quantity;//カートのアイテムからリクエストされたアイテムの個数引く
        $item = $item_user->item;
        $item->quantity+=$quantity;
        $item->save();
        if($request->quantity==0){ //リクエストされたアイテムの個数が0なら
            $item_user->delete();
        }else{
            $item_user->quantity=$request->quantity; //1以上なら入力された値でアップデート
            $item_user->price=$item->price*$request->quantity;
            $item_user->save();
        }

        return redirect (route('carts.show'));
    }

    public function destroy(ItemUser $item_user)
    {
        $item = $item_user->item; //item取得
        $item->quantity+=$item_user->quantity; //在庫増やしてる
        $item->save();
        $item_user->delete(); //カートの中身削除
        return redirect('/users')->with('flash_message', 'カートから削除しました');
    }

    public function purchased(){
        $item_users = ItemUser::where([['user_id',Auth::id()],['purchased',0]])->get();
        foreach($item_users as $item_user){
            $item_user->purchased=1;
            $item_user->save();
        }
        return redirect('/users')->with('flash_message', '購入しました。');
    }

    public function history(){
        $item_users = ItemUser::where([['user_id',Auth::id()],['purchased',1]])->get();
        return view('carts.history', ['item_users' => $item_users]);
    }
}

