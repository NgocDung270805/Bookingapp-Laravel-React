<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Services\StatsService;
use Illuminate\Support\Facades\DB;
use App\Events\BookingStatsUpdated;

class DashboardController extends Controller
{
    protected $statsService;

    public function __construct(StatsService $statsService)
    {
        $this->statsService = $statsService;
    }

    public function index()
    {
        $stats = $this->getStatsData();
        return view('index', compact('stats'));
    }

    public function getBookingStats(Request $request)
    {
        $filter = $request->get('filter', 'year');

        $query = DB::table('bookings');

        switch ($filter) {
            case 'year':
                $query->selectRaw('YEAR(created_at) as label')
                    ->selectRaw('COUNT(*) as value')
                    ->groupByRaw('YEAR(created_at)')
                    ->orderByRaw('YEAR(created_at)');
                break;

            case 'month':
                $query->selectRaw('DATE_FORMAT(created_at, "%Y-%m-01") as label')
                    ->selectRaw('COUNT(*) as value')
                    ->where('created_at', '>=', now()->subYear())
                    ->groupByRaw('DATE_FORMAT(created_at, "%Y-%m")')
                    ->orderBy('label');
                break;

            case 'day':
                $query->selectRaw('DATE(created_at) as label')
                    ->selectRaw('COUNT(*) as value')
                    ->where('created_at', '>=', now()->subMonth())
                    ->groupByRaw('DATE(created_at)')
                    ->orderBy('label');
                break;
        }

        $stats = $query->get();

        return response()->json([
            'labels' => $stats->pluck('label'),
            'values' => $stats->pluck('value')
        ]);
    }

    public function getStats()
    {
        $stats = $this->statsService->getStats();
        return response()->json($stats);
    }

    private function getStatsData()
    {
        $stats = $this->statsService->getStats();

        // Broadcast ngay khi có thay đổi
        $this->broadcastStats($stats);
        return $stats;
    }

    private function broadcastStats($stats)
    {
        try {
            broadcast(new BookingStatsUpdated($stats))->toOthers();
        } catch (\Exception $e) {
        }
    }
}
