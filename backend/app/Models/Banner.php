<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'title',
        'image_path',
        'link',
        'is_active',
    ];

    protected $casts = [
        'type' => 'integer',
        'is_active' => 'boolean',
    ];

    // Định nghĩa các hằng số cho type để dễ quản lý
    public const TYPE_LOGO = 1;
    public const TYPE_FOOTER_BACKGROUND = 2;
    public const TYPE_HOMEPAGE_BANNER = 3;
    public const TYPE_SLIDER_IMAGE = 4;
    public const TYPE_PRODUCT_BANNER = 5;
    public const TYPE_CUSTOMERS_HAVE_PURCHASED = 6;
    public const TYPE_VEHICLE_DELIVERY = 7;

    // Ví dụ về Accessor để có URL ảnh đầy đủ nếu cần
    public function getImageUrlAttribute()
    {
        return $this->image_path ? asset('storage/' . $this->image_path) : null;
    }
}
