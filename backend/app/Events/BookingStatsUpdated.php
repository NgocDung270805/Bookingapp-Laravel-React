<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class BookingStatsUpdated implements ShouldBroadcastNow 
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $stats;

    public function __construct($stats)
    {
        $this->stats = $stats;
    }

    public function broadcastOn()
    {
        return ['dashboard-stats'];
    }

    public function broadcastAs()
    {
        return 'stats.updated';
    }

    public function broadcastWith()
    {
        return $this->stats;
    }
}