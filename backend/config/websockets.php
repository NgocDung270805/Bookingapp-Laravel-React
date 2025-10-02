<?php

return [
    'dashboard' => [
        'port' => env('LARAVEL_WEBSOCKETS_PORT', 6001),
    ],

    'default' => 'pusher',
    
    'apps' => [
        [
            'id' => env('PUSHER_APP_ID'),
            'name' => env('APP_NAME'),
            'key' => env('PUSHER_APP_KEY'),
            'secret' => env('PUSHER_APP_SECRET'),
            'enable_client_messages' => false,
            'enable_statistics' => true,
        ],
    ],

    'ssl' => [
        'local_cert' => null,
        'local_pk' => null,
        'passphrase' => null
    ],

    'statistics' => [
        'enabled' => false,
        'model' => null,
        'interval_in_seconds' => 60,
        'delete_statistics_older_than_days' => 60,
    ],

    'max_request_size_in_kb' => 250,
];