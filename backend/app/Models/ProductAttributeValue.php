<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductAttributeValue extends Model
{
    use HasFactory;

    protected $fillable = [
        'attribute_type_id',
        'value',
        'metadata',
    ];

    protected $casts = [
        'metadata' => 'array', // Cast metadata JSON column to array
    ];

    /**
     * Get the attribute type that owns the attribute value (Many-to-One relationship).
     */
    public function attributeType()
    {
        return $this->belongsTo(ProductAttributeType::class, 'attribute_type_id');
    }

    /**
     * The product variants that have this attribute value (Many-to-Many relationship).
     */
    public function variants()
    {
        return $this->belongsToMany(ProductVariant::class, 'product_variant_attribute_value', 'product_attribute_value_id', 'product_variant_id');
    }
}
