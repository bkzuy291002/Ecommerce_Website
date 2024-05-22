<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'max:255',
            ],
            'category_id' => [
                // 'required',
            ],
            'sku' => [
                'required',
            ],
            'slug' => [
                'required',
                'max:255'
            ],
            'price' => [
                'required',
                'max:255',
            ],
            'store_id' => [
//                'required',
            ],
            'published'=> [
                'required',
            ],
            'quantity'=>[
                'required',
            ],
            'description'=> [
                // 'required',
            ],
            'discount'=> [
                // 'required',
            ],
            'warranty'=> [
            ],
            'warranty_type'=> [
            ],
            'city_id'=> [
            ],
            'brand'=> [
            ],
        ];
    }
}
