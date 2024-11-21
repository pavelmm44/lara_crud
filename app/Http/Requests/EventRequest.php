<?php

namespace App\Http\Requests;

use App\Models\Category;
use App\Models\Event;
use App\Models\Tag;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EventRequest extends FormRequest
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
        $uniqueRule = Rule::unique(Event::class);

        if ($this->route('event')) {
            $uniqueRule = $uniqueRule->ignore($this->route('event'));
        }

        return [
            'title' => 'required|max:128',
            'url' => [
                'required' ,
                'max:128',
                $uniqueRule
            ],
            'start_time' => "date|after:tomorrow",
            'duration' => 'numeric|between:0.5,99.99|decimal:2',
            'category_id' => [
                'required',
                'exists:' . Category::class . ',id'
            ],
            'tags' => 'array',
            'tags.*' => [
                'integer',
                'exists:' . Tag::class . ',id'
            ]
        ];
    }
}
