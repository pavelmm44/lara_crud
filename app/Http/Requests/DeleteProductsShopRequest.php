<?php

namespace App\Http\Requests;

use App\Models\Product;
use Illuminate\Database\Query\Builder;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DeleteProductsShopRequest extends FormRequest
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
            'products' => 'required|array',
            'products.*' => [
                'integer',
                Rule::exists('product_shop', 'product_id')->where(function (Builder $query) {
                    return $query->where('shop_id', $this->route('shop')->id);
                }),
            ]
        ];
    }
}
