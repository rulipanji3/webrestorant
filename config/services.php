<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'postmark' => [
        'key' => env('POSTMARK_API_KEY'),
    ],

    'resend' => [
        'key' => env('RESEND_API_KEY'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    'admin' => [
        'user' => env('ADMIN_USER', 'admin'),
        'pass' => env('ADMIN_PASS', 'secret'),
    ],

    'whatsapp' => [
        'number' => env('WHATSAPP_NUMBER', '6285810405551'),
    ],

    'booking' => [
        'max_guests_per_slot' => (int) env('MAX_GUESTS_PER_SLOT', 40),
    ],

    'order_notification_email' => env('ORDER_NOTIFICATION_EMAIL'),

];
