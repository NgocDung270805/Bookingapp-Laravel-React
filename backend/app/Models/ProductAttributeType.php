<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductAttributeType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'display_type',
    ];

    /**
     * Get the attribute values for the attribute type (One-to-Many relationship).
     */
    public function values()
    {
        return $this->hasMany(ProductAttributeValue::class, 'attribute_type_id');
    }
}
