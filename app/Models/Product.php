<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $fillable = ['name', 'price', 'quantity'];

    public function propertyValues(): HasMany
    {
        return $this->hasMany(ProductPropertyValue::class);
    }

    public function properties()
    {
        return $this->belongsToMany(Property::class, 'product_property_values')
            ->withPivot('value');
    }
}
