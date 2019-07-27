<?php

return [
    'endpoint' => 'https://domain.com/graphql',
    'oauth' => [
        'enabled' => false,
        'client_id' => env('GRAPHQL_CLIENT_ID'),
        'client_secret' => env('GRAPHQL_CLIENT_SECRET'),
    ]
];
