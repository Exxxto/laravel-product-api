<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Property extends Model
{
    protected $fillable = ['name'];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_property_values')
            ->withPivot('value');
    }

    public function values()
    {
        return $this->hasMany(ProductPropertyValue::class);
    }
}

