<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AppNotification extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'notifications';

    protected $fillable = [
        'type',
        'notifiable_id',
        'notifiable_type',
        'title',
        'message',
        'priority',
        'is_active',
        'is_popup',
        'is_displayed',
        'is_banner',
        'audience',
        'channel',
        'category',
        'action_url',
        'sent_by',
        'expires_at',
        'is_sent',
        'data',
        'read_at',
        'display_page'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_popup' => 'boolean',
        'is_displayed' => 'boolean',
        'is_banner' => 'boolean',
        'is_sent' => 'boolean',
        'data' => 'array',
        'expires_at' => 'datetime',
        'read_at' => 'datetime',
        'priority' => 'integer',
        'notifiable_id' => 'integer'
    ];
}
