<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Item;
use App\Http\Requests\ItemRequest;
use App\Http\Requests\ItemUpdateRequest;
use Illuminate\Support\Facades\Storage;


class ItemController extends Controller
{
    public function index()
    {
    $items = Item::all();

        return view('item.index', compact('items'));
    }

    /**  新規作成画面 */
    public function create()
    {
        return view('item.create');
    }

    /** 確認画面に表示するための処理 */
    public function confirm(ItemRequest $request)
    {
        $post_data = $request->except('image');
        $image = $request->file('image');

        $temp_path = $image->store('public/temp');
        $read_temp_path = str_replace('public/', 'storage/', $temp_path);

        $name = $post_data['name'];
        $price = $post_data['price'];
        $quantity = $post_data['quantity'];
        $text = $post_data['text'];

        $data = array(
            'temp_path' => $temp_path,
            'read_temp_path' => $read_temp_path,
            'name' => $name,
            'price' => $price,
            'quantity' => $quantity,
            'text' => $text,
        );

        $request->session()->put('data', $data);

        return view('item.confirm', compact('data'));
    }

    public function store(Request $request)
    {
        $data = $request->session()->get('data');
        $temp_path = $data['temp_path'];
        $read_temp_path = $data['read_temp_path'];

        $filename = str_replace('public/temp/', '', $temp_path);
        $storage_path = 'public/images/item/'.$filename;

        $request->session()->forget('data');

        Storage::move($temp_path, $storage_path);

        $read_path = str_replace('public/', '/storage/', $storage_path);

        $name = $data['name'];
        $price = $data['price'];
        $quantity = $data['quantity'];
        $text = $data['text'];

        Item::create([
            'path' => $read_path,
            'temp_path' => $temp_path,
            'read_temp_path' => $read_temp_path,
            'name' => $name,
            'price' => $price,
            'quantity' => $quantity,
            'text' => $text,
        ]);

        return redirect()->route('item.create')->with('message', __($name.'を追加しました。'));

    }
    
}
