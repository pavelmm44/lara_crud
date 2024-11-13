<?php

namespace App\Http\Requests;

use App\Models\Shop;
use Illuminate\Foundation\Http\FormRequest;

class SaveShopsProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'shops_ids' => array_keys($this->shops),
        ]);
    }

    public function rules(): array
    {
        return [
            'shops' => 'required|array',
            'shops.*' => 'nullable|integer|gt:0',
            'shops_ids.*' => 'integer|exists:' . Shop::class . ',id',
        ];
    }

    public function attributes()
    {
        return [
            'shops' => 'Shops list',
            'shops_ids.*' => 'shop',
            'shops.*' => 'price'
        ];
    }
}
