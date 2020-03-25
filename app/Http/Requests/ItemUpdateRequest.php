<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' =>  'required|max:10',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'image' => 'required|file|image|mimes:jpeg,png,jpg,gif',
            'text' => 'required|string',
        ];
    }

    public function attributes()
    {
        return[
        'name' =>  '商品名',
            'price' => '価格',
            'quantity' => '在庫',
            'image' => '写真',
            'text' => 'テキスト',
        ];
    }
}
