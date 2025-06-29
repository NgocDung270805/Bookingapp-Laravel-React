<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'description',
        // Các trường được giữ lại trong products
        'img',
        'status',
        'is_featured',
        'views',
        'sold',
    ];

    /**
     * The categories that belong to the product (Many-to-Many).
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_category', 'product_id', 'category_id');
    }

    /**
     * The tags that belong to the product (Many-to-Many).
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tag', 'product_id', 'tag_id');
    }

    /**
     * Get the product variants for the product.
     */
    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }

    /**
     * Get the product images for the product.
     */
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
    
    // Thêm accessor để lấy giá thấp nhất từ các biến thể (dùng trong View)
    public function getMinPriceAttribute()
    {
        return $this->variants->min('price');
    }

    public function attributeValueConfigs()
    {
        return $this->hasMany(ProductAttributeValueConfig::class);
    }
}
