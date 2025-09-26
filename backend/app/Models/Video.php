<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Video extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'video',
        'img_banner',
        'description',
        'status'
    ];

    protected $casts = [
        'status' => 'boolean'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'video_category');
    }
}