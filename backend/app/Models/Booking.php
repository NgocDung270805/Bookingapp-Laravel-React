<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Events\BookingStatsUpdated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;
use Illuminate\Testing\Fluent\Concerns\Has;

class Booking extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $fillable = [
        'user_id',
        'product_id',
        'booking_date',
        'booking_time',
        'status',
        'notes',
        'total_price',
    ];

    protected $casts = [
        'booking_date' => 'date',
        'total_price' => 'decimal:2',
    ];

    const STATUS_PENDING = 'pending';
    const STATUS_COMPLETED = 'completed';
    const STATUS_CANCELLED = 'cancelled';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    protected static function booted()
    {
        // Theo dõi khi tác động(real-time)
        static::saved(function ($booking) {
            static::broadcastStats();
        });

        static::deleted(function ($booking) {
            static::broadcastStats();
        });
    }

    protected static function broadcastStats()
    {
        // Lấy stats mới nhất
        $stats = [
            'new_bookings' => static::count(),
            'pending_bookings' => static::where('status', 'pending')->count()
        ];

        try {
            event(new BookingStatsUpdated($stats));
        } catch (\Exception $e) {
        }
    }
}
