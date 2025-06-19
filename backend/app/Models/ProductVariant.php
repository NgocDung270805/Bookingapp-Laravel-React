<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductVariant extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'variant_name',
        'sku',
        'pricing_type',
        'price',
        'discount_price',
        'discount_percent',
        'quantity',
        'img',
        'status',
        'is_featured',
    ];

    /**
     * Get the product that owns the variant.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get the product images for the variant (One-to-Many relationship).
     */
    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_variant_id');
    }
}
