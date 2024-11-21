<?php

namespace App\Http\Requests;

use App\Models\Tag;
use Illuminate\Foundation\Http\FormRequest;

class MessageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'min:10|max:30',
            'content' => 'min:10',
            'tags' => 'array',
            'tags.*' => [
                'integer',
                'exists:' . Tag::class . ',id'
            ]
        ];
    }
}
