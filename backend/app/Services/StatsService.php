<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Booking;
use App\Events\StatsUpdated;
use Illuminate\Support\Facades\DB;
use App\Events\BookingStatsUpdated;
use Illuminate\Support\Facades\Log;

class StatsService
{
    public function getStats()
    {
        // Lấy timestamp 24h trước theo giờ Việt Nam
        $now = new \DateTime('now', new \DateTimeZone('Asia/Ho_Chi_Minh'));
        $last24Hours = $now->modify('-24 hours')->format('Y-m-d H:i:s');
        
        $stats = [
            'new_bookings' => DB::table('bookings')->whereRaw('CONVERT_TZ(created_at, "UTC", "Asia/Ho_Chi_Minh") >= ?', [$last24Hours])->count(),
            'pending_bookings' => DB::table('bookings')->where('status', 'pending')->count(),
            // Sản phẩm hết hàng
            'out_of_stock' => DB::table('product_variants')->where('quantity', 0)->count(),
        ];

        Log::info('Stats calculated', $stats);
        $this->broadcastStats($stats);

        return $stats;
    }

    private function broadcastStats($stats)
    {
        try {
            if (isset($stats['out_of_stock'])) {
                event(new BookingStatsUpdated($stats, 'product'));
            } else {
                event(new BookingStatsUpdated($stats, 'booking'));
            }
        } catch (\Exception $e) {
            Log::error('Failed to broadcast stats', ['error' => $e->getMessage()]);
        }
    }
}