<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\categories;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\CategoryUpdateRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = categories::all();

        return view('category.index', compact('categories'));
    }

    public function edit(categories $category)
    {
                
        return view('category.edit', compact('category'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function confirm(CategoryRequest $request)
    {
        $post_data = $request->input('name');

        $data = array(
            'name' => $post_data,
        );

        $request->session()->put('data', $data);

        return view('category.confirm', compact('data'));
    }

    public function store(Request $request)
    {
        $data = $request->session()->get('data');
        $request->session()->forget('data');

        $name = $data['name'];

        categories::create([
            'name' => $name,
        ]);

        return redirect()->route('category.create')
        ->with('message', __($name.'を追加しました。'));
    }

    public function update(CategoryUpdateRequest $request, categories $category)
    {

        $category->name = $request->get('name');
        $category->save();

        return redirect()->route('category.edit',$category)
            ->with('message', __('編集しました。'));
    }

    public function destroy($id)
    {
        categories::find($id)->delete();

        return redirect()->route('category.index')
            ->with('message', __($id.'を削除しました。'));
    }
}
