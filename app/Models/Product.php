<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    protected $guarded = [];

    public function shops(): BelongsToMany
    {
        return $this->belongsToMany(Shop::class)->withPivot('price')->withTimestamps();
    }
}
