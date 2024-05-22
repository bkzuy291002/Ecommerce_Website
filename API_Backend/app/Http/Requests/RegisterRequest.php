<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'phone' => [
                // 'required',
                'max:255',
            ],
            'gender' => [
                // 'required',
                'max:255',
            ],
            'city_id' => [
                'required',
            ],
            'district_id' => [
                'required',
            ],
            'address' => [
                'required',
                'max:255'
            ],
            'email' => [
                'required',
                'max:255',
                'unique:users,email'
            ],
            'password' => [
                'required',
                'min:8',
                'max:16',
                'confirmed'
            ]
        ];
    }
}
