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

    protected $casts = [
        'price' => 'decimal:2',
        'discount_price' => 'decimal:2',
        'discount_percent' => 'integer',
        'quantity' => 'integer',
        'status' => 'boolean',
        'is_featured' => 'boolean',
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

    /**
     * The product attribute values that describe this variant (Many-to-Many relationship).
     * Đây là mối quan hệ mà Laravel đang tìm kiếm.
     */
    public function attributeValues()
    {
        return $this->belongsToMany(ProductAttributeValue::class, 'product_variant_attribute_value', 'product_variant_id', 'product_attribute_value_id');
    }
}
