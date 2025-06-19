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
     * The products that belong to the tag.
     */
    public function products()
    {
        // Định nghĩa mối quan hệ nhiều-nhiều với Product
        // 'product_tag' là tên bảng trung gian
        // 'tag_id' là khóa ngoại của bảng hiện tại trong bảng trung gian
        // 'product_id' là khóa ngoại của model liên quan trong bảng trung gian
        return $this->belongsToMany(Product::class, 'product_tag', 'tag_id', 'product_id');
    }
}
