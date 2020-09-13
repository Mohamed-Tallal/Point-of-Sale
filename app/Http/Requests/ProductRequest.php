<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        return
            [
            'name' =>'required|string',
            'mainPrice' =>'required|numeric',
            'salesPrice' =>'required|numeric',
            'store' =>'required|numeric',
            'image' =>'required|mimes:jpg,png,jpeg,',
            'category_id' =>'required',
            'description' =>'required',

            ];
    }
}
