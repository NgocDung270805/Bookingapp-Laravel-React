<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Services\StatsService;
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