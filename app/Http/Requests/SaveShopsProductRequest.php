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

    public function rules(): array
    {
        return [
            'shops' => 'required|array',
            'shops.*.price' => 'nullable|integer|gt:0',
            'shops.*.id' => 'integer|exists:' . Shop::class . ',id',
        ];
    }

    public function attributes()
    {
        return [
            'shops' => 'Shops list',
            'shops.*.price' => 'Price',
            'shops.*.id' => 'Shop'
        ];
    }
}
