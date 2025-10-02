<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('dashboard-stats', function () {
    return true;
});