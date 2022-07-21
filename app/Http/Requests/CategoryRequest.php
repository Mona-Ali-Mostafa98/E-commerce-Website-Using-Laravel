<?php

namespace App\Http\Requests;

use App\Models\Category;
use App\Rules\ParentRule;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $id = $this -> route ('category'); // Gets the ID currently excluded, where category is a parameter in route {}
        return [
        'name' => ['required','max:255','min:3','unique:categories,name,'.$id],
        'description' => 'nullable|max:1000',
        'parent_id' => ['nullable','exists:categories,id',new ParentRule($id)], //"parent:$id"
    ];
    }
}