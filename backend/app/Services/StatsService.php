<?php

namespace App\Services;

use App\Models\Order;
use App\Events\StatsUpdated;
use App\Models\Booking;

class StatsService
{
    public function getStats()
    {
        $stats = [
            'new_bookings' => $this->getTotalBookings(),
            'pending_bookings' => $this->getPendingBookings()
        ];

        $this->broadcastStats($stats);

        return $stats;
    }

    private function getTotalBookings()
    {
        return Booking::count();
    }

    private function getPendingBookings() 
    {
        return Booking::where('status', 'pending')->count();
    }

    private function broadcastStats($stats)
    {
        try {
            event(new StatsUpdated($stats));
        } catch (\Exception $e) {
        }
    }
}