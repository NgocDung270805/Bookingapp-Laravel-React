<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'price',
        'discount_price',
        'discount_percent',
        'quantity',
        'img',
        'status',
        'is_featured',
        'views',
        'sold',
    ];

    /**
     * Get the category that owns the product.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * The tags that belong to the product.
     */
    public function tags()
    {
        // Định nghĩa mối quan hệ nhiều-nhiều với Tag
        // 'product_tag' là tên bảng trung gian
        // 'product_id' là khóa ngoại của bảng hiện tại trong bảng trung gian
        // 'tag_id' là khóa ngoại của model liên quan trong bảng trung gian
        return $this->belongsToMany(Tag::class, 'product_tag', 'product_id', 'tag_id');
    }
}
