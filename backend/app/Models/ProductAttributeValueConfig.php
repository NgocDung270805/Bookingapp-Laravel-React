<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttributeValueConfig extends Model
{
    use HasFactory;

    protected $table = 'product_attribute_value_configs'; // Tên bảng trong database

    protected $fillable = [
        'product_id',
        'product_attribute_value_id',
        'price',
        'discount_price',
        'discount_percent',
        'quantity',
        'img_path',
        'is_active',
        'is_featured',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'discount_price' => 'decimal:2',
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function attributeValue()
    {
        return $this->belongsTo(ProductAttributeValue::class, 'product_attribute_value_id');
    }

    // Đảm bảo mối quan hệ hasOneThrough này là đúng
    public function attributeType()
    {
        return $this->hasOneThrough(
            ProductAttributeType::class,      // Model cuối cùng bạn muốn lấy (Attribute Type)
            ProductAttributeValue::class,     // Model trung gian (Attribute Value)
            'id',                             // Khóa cục bộ trên bảng trung gian (product_attribute_values.id)
            'id',                             // Khóa cục bộ trên model cuối cùng (product_attribute_types.id)
            'product_attribute_value_id',     // Khóa ngoại trên model hiện tại (product_attribute_value_configs.product_attribute_value_id)
            'attribute_type_id'               // Khóa ngoại trên bảng trung gian (product_attribute_values.attribute_type_id)
        );
    }
}