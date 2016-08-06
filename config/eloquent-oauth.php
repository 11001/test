<?php

use App\User;

return [
    'model' => App\Entities\User::class,
    'table' => 'oauth_identities',
    'providers' => [
        'facebook' => [
            'client_id' => env('FACEBOOK_CLIENT_ID', 'XXXXX'),
            'client_secret' => env('FACEBOOK_SECRET', 'XXXX'),
            'redirect_uri' => env('FACEBOOK_REDIRECT_URI', 'XXXX'),
            'scope' => [],
        ],
        'google' => [
            'client_id' =>  env('GOOGLE_CLIENT_ID', 'XXXX'),
            'client_secret' => env('GOOGLE_CLIENT_SECRET', 'XXXX'),
            'redirect_uri' => env('GOOGLE_REDIRECT_URI', 'XXXX'),
            'scope' => [],
        ],
        'github' => [
            'client_id' => '12345678',
            'client_secret' => 'y0ur53cr374ppk3y',
            'redirect_uri' => 'https://example.com/your/github/redirect',
            'scope' => [],
        ],
        'linkedin' => [
            'client_id' => '12345678',
            'client_secret' => 'y0ur53cr374ppk3y',
            'redirect_uri' => 'https://example.com/your/linkedin/redirect',
            'scope' => [],
        ],
        'instagram' => [
            'client_id' => '12345678',
            'client_secret' => 'y0ur53cr374ppk3y',
            'redirect_uri' => 'https://example.com/your/instagram/redirect',
            'scope' => [],
        ],
        'soundcloud' => [
            'client_id' => '12345678',
            'client_secret' => 'y0ur53cr374ppk3y',
            'redirect_uri' => 'https://example.com/your/soundcloud/redirect',
            'scope' => [],
        ],
    ],
];
