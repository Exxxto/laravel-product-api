<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Product;
use App\Models\Property;

class ProductPropertyValue extends Model
{
    protected $fillable = ['product_id', 'property_id', 'value'];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }
}

