<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Events\StatsUpdated;

class UpdateStats extends Command
{
    protected $signature = 'stats:update';
    protected $description = 'Update realtime statistics';

    public function handle()
    {
        // Get latest stats from database
        $stats = [
            // 'new_orders' => \App\Models\Order::whereDate('created_at', today())->count(),
            // 'pending_orders' => \App\Models\Order::where('status', 'pending')->count(),
            'out_of_stock' => \App\Models\Product::where('stock', 0)->count(),
            // 'total_revenue' => \App\Models\Order::whereDate('created_at', today())->sum('total'),
            'conversion_rate' => 10.32, // Calculate actual conversion rate
        ];

        // Broadcast update
        broadcast(new StatsUpdated($stats))->toOthers();

        $this->info('Stats updated successfully');
    }
}