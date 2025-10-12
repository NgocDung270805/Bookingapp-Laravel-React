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
        // Lấy thời gian 24h trước (tự động theo timezone đã cấu hình)
        $last24Hours = now()->subHours(24);
        
        $stats = [
            'new_bookings' => DB::table('bookings')->where('created_at', '>=', $last24Hours)->count(),
            'pending_bookings' => DB::table('bookings')->where('status', 'pending')->count(),
            // Lấy ra tống số lượt booking theo năm, tháng, ngày
            'bookings_by_year' => DB::table('bookings')
                ->select(DB::raw('YEAR(created_at) as year'), DB::raw('COUNT(*) as count'))
                ->groupBy('year')
                ->orderBy('year', 'desc')
                ->get(),
            'bookings_by_month' => DB::table('bookings')
                ->select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'), DB::raw('COUNT(*) as count'))
                ->groupBy('month')
                ->orderBy('month', 'desc')
                ->get(),
            'bookings_by_day' => DB::table('bookings')
                ->select(DB::raw('DATE(created_at) as date'), DB::raw('COUNT(*) as count'))
                ->groupBy('date')
                ->orderBy('date', 'desc')
                ->get(),
            // Sản phẩm hết hàng
            'out_of_stock' => DB::table('product_variants')->where('quantity', 0)->count(),
        ];

        Log::info('Stats calculated', $stats);

        // Broadcast qua WebSocket
        try {
            event(new StatsUpdated($stats));
        } catch (\Exception $e) {
            Log::error('Failed to broadcast stats', ['error' => $e->getMessage()]);
        }

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