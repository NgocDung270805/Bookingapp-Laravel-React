<?php

namespace App\Providers;

use App\Events\StatsUpdated;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        // Add more events here
    ];

    public function boot(): void
    {
        // Register Pusher Channels
        Broadcast::channel('stats', function ($user) {
            return true; // Public channel, allow all
        });
    }
}