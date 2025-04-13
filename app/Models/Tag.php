<?php

namespace App\Models;

use App\Traits\Models\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Tag extends Model
{
    use HasFactory;
    use HasSlug;

    protected $guarded = [];

    public function events(): MorphToMany
    {
        return $this->morphedByMany(Event::class, 'taggable');
    }

    public function messages(): MorphToMany
    {
        return $this->morphedByMany(Message::class, 'taggable');
    }

    protected function slugColumn(): string
    {
        return 'url';
    }
}
