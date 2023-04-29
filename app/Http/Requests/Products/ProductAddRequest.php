<?php

namespace App\Http\Requests\Products;

use Illuminate\Foundation\Http\FormRequest;

class ProductAddRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "name" => "required|string",
            "description" => "string",
            "image" => "image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "price" => "integer",
            "category" => "required|exists:categories,id",
            "sub_category" => "nullable|exists:sub_categories,id",
            "brand" => "required|exists:brands,id",
            "rating" => "string",
        ];
    }
}
