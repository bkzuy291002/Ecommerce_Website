<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
class EditProductRequest extends FormRequest
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
            'category_id' => [
                'required'
            ],
            'sku' => [
                'required'
            ],
            'name' => [
                'required',
                'max:255'
            ],
            'slug' => [
                'required',
                'max:255',
                Rule::unique('products', 'slug')->ignore($this->product)
            ],
            'quantity' => [
                'required',
                'numeric'
            ],
            'price' => [
                'required',
                'numeric'
            ],
            'discount' => [
                'nullable',
                'numeric'
            ],
            'discount_type' => [
                'numeric'
            ],
            'published' => [
                'numeric'
            ],
            'photos.*' => [
                'nullable',
                'mimes:jpg,jpeg,png,webp'
            ],
            'description' => [
                'nullable'
            ],
            'brand' => [
                'nullable',
                'max:255'
            ],
            'warranty' => [
                'nullable',
                'max:255'
            ],
            'warranty_type' => [
                'nullable',
                'max:255'
            ],
            'city_id' => [
                'nullable'
            ],
            'varaints.*' => [
                'nullable'
            ],
            'variants.*.id' => [
                'nullable'
            ],
            'variants.*.product_id' => [
                'nullable'
            ],
            'variants.*.color' => [
                'required_with:variants.*',
                'max:255'
            ],
            'variants.*.price' => [
                'nullable',
                'numeric'
            ],
            'images.*' => [
                'nullable'
            ],
            'deleteVariants.*' => [
                'nullable'
            ],
            'currentImages.*' => [
                'nullable'
            ]
        ];
    }
    protected function prepareForValidation(): void
    {
        $this->merge([
            'slug' => Str::slug($this->slug),
        ]);
    }
}
