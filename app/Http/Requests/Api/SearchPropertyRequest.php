<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class SearchPropertyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'nullable|string|max:255',
            'bedrooms' => 'nullable|integer|min:0',
            'bathrooms' => 'nullable|integer|min:0',
            'storeys' => 'nullable|integer|min:0',
            'garages' => 'nullable|integer|min:0',
            'price_from' => 'nullable|integer|min:0',
            'price_to' => 'nullable|integer|min:0|gte:price_from',
        ];
    }

    public function messages(): array
    {
        return [
            'price_to.gte' => 'The maximum price must be greater than or equal to the minimum price.',
        ];
    }
}
