<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Item;

class CartUpdateRequest extends FormRequest
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
        $max = Item::find($this->item_id)->quantity;//itemの在庫を見つけてる

        return [
            'quantity' => 'required|numeric|min:0|max:'.$max, //そのitemの在庫より多く設定できないようにしている
        ];
    }
}
