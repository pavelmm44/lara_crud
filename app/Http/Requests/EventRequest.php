<?php

namespace App\Http\Requests;

use App\Models\Event;
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
        $categories = config('categories');

        $uniqueRule = Rule::unique(Event::class);

        if ($this->method() == 'PUT') {
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
                Rule::in(array_keys($categories))
            ]
        ];
    }
}
