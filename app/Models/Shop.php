<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Shop extends Model
{

    protected $guarded = [];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)->withPivot('price')->withTimestamps();
    }

    public function getProductPriceAttribute()
    {
        return $this->pivot?->price ?? null;
    }
}
