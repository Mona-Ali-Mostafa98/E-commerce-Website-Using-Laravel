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
        return true; //if false return 403 THIS ACTION IS UNAUTHORIZED.
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        //  id , name , description ,category_id , price , sale_price , quantity , image
        return [
        'name' => 'required|max:255|min:3',
        'description' => 'nullable|max:1000',
        'category_id' => 'required|exists:categories,id',
        'price' => 'required|numeric|min:0',
        'sale_price' => 'nullable|numeric|min:0',
        'quantity' => 'required|integer|min:0',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'featured'=> 'required|boolean',
        'views' => 'nullable|numeric',
        'sales' => 'nullable|numeric'
    ];

    }
}