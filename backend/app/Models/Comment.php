<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'content',
        'rating',
        'parent_id', // Added to fillable
    ];

    protected $casts = [
        'rating' => 'integer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Relationship with replies
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

    // Relationship with parent comment
    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }
}
