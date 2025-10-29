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
        // Xác định khoảng thời gian
        $currentWeekStart = now()->subDays(7); // Bắt đầu từ 7 ngày trước (ví dụ: 22/10 11:48)
        $lastWeekStart = now()->subDays(14); // Bắt đầu từ 14 ngày trước (ví dụ: 15/10 11:48)

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
            
            // Thống kê booking trong 7 ngày gần đây và tổng đơng hoàn thành và chưa hoàn thành
            'bookings_last_7_days' => DB::table('bookings')
                ->select(DB::raw('DATE(created_at) as date'), DB::raw('COUNT(*) as count'))
                ->where('created_at', '>=', now()->subDays(7))
                ->groupBy('date')
                ->orderBy('date', 'desc')
                ->get(),

            // Thống kê booking hoàn thành và chưa hoàn thành trong 7 ngày gần đây
            'bookings_last_7_days_summary' => DB::table('bookings')
                ->select(DB::raw('COUNT(*) as total'), DB::raw('SUM(CASE WHEN status = "completed" THEN 1 ELSE 0 END) as completed'), DB::raw('SUM(CASE WHEN status = "pending" THEN 1 ELSE 0 END) as pending'))
                ->where('created_at', '>=', $currentWeekStart) // Sử dụng biến đã định nghĩa
                ->first(),

            'bookings_current_week' => DB::table('bookings')
                ->where('created_at', '>=', $currentWeekStart)
                ->count(),

            'bookings_last_week' => DB::table('bookings')
                ->where('created_at', '>=', $lastWeekStart)
                ->where('created_at', '<', $currentWeekStart) // Giới hạn đến thời điểm bắt đầu tuần hiện tại
                ->count(),

            // Thống kê commet mới nhất của tất cả sản phẩm, và kèm theo lấy tên sản phẩm kèm theo ảnh sản phẩm ở table product_variants và tên user kèm hình ảnh table users_profiles
            'latest_comments' => DB::table('comments')
                ->join('products', 'comments.product_id', '=', 'products.id')
                ->join('users', 'comments.user_id', '=', 'users.id')
                ->join('users_profiles', 'users.id', '=', 'users_profiles.user_id')
                ->join('product_variants', 'products.id', '=', 'product_variants.product_id')
                ->select('comments.*', 'products.name as product_name', 'users.name as user_name', 'users_profiles.avatar as user_avatar', 'product_variants.img as product_image')
                ->orderBy('comments.created_at', 'desc')
                ->get(),

            // Thống kê số users mới nhất trong 7 ngày gần đây
            'new_users_last_7_days' => DB::table('users')
                ->where('created_at', '>=', $currentWeekStart) // Dùng biến cho nhất quán
                ->count(),
            
            // 1. Lấy tổng user của 7 ngày TRƯỚC ĐÓ (để tính % tăng/giảm)
            'new_users_previous_7_days' => DB::table('users')
                ->where('created_at', '>=', $lastWeekStart)
                ->where('created_at', '<', $currentWeekStart)
                ->count(),

            // 2. Lấy user mới THEO NGÀY (cho biểu đồ đường)
            'new_users_by_day_last_7_days' => DB::table('users')
                ->select(DB::raw('DATE(created_at) as date'), DB::raw('COUNT(*) as count'))
                ->where('created_at', '>=', $currentWeekStart)
                ->groupBy('date')
                ->orderBy('date', 'asc') // Sắp xếp tăng dần cho biểu đồ đường
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