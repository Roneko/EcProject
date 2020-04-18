<?php

namespace App\Http\Controllers\admin;

use App\categories;
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

    public function edit(Item $item)
    {
        return view('item.edit', compact('item'));
    }

    public function create()
    {
    
        return view('item.create');
    }

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
        $id = $post_data['category_name'];
        //categoriesテーブルのidを全取得させ、idと一致するnameカラムを取得している↓
        $category_name = categories::where('id', $id)->first()->name;

        $data = array(
            'temp_path' => $temp_path,
            'read_temp_path' => $read_temp_path,
            'name' => $name,
            'price' => $price,
            'quantity' => $quantity,
            'text' => $text,
            'id' => $id,
            'category_name' => $category_name,
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
            $storage_path = 'public/images/benefit/'.$filename;

            $request->session()->get('data');

            Storage::move($temp_path, $storage_path);

            $read_path = str_replace('public/', '/storage/', $storage_path);
        
            $name = $data['name'];
            $price = $data['price'];
            $quantity = $data['quantity'];
            $text = $data['text'];
            $id = $data['id'];

            item::create([
                'path' => $read_path,
                'name' => $name,
                'price' => $price,
                'quantity' => $quantity,
                'text' => $text,
                'category_id' => $id,
            ]);

        return redirect()->route('item.create')
        ->with('message', __($name.'を追加しました。'));
    }

    public function update(ItemUpdateRequest $request, Item $item)
    {
        if ($request->image) {
            $image = $request->file('image');
            $storage_path = $image->store('public/images/item/');
            $read_path = str_replace('public/', '/storage/', $storage_path);
            $item->path = $read_path;
            $item->save();
        }

        $params = $request->only(['name', 'price', 'text','quantity','category_id']);
        $item->fill($params)->save();

        return redirect()->route('item.edit', $item)
            ->with('message', __($item->name.'を編集しました。'));
    }

    public function destroy(Item $item)
    {
        $item->delete();

        return redirect()->route('item.index')
            ->with('message', __($item->name.'の情報を削除しました。'));
    }

}