<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name', 'slug'];

   /**
     * The categories that belong to the tag.
     */
    public function categories()
    {
        // Đây là mối quan hệ nhiều-nhiều đã có từ trước với Category
        return $this->belongsToMany(Category::class, 'category_tag', 'tag_id', 'category_id');
    }

    /**
     * The products that belong to the tag (Many-to-Many).
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_tag', 'tag_id', 'product_id');
    }
}
