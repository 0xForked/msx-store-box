<?php
return [
    'account' => [
        'base_uri' => env('ACCOUNTS_SERVICE_BASE_URL'),
        'secret' => env('ACCOUNTS_SERVICE_SECRET'),
    ],
    'product' => [
        'base_uri' => env('PRODUCTS_SERVICE_BASE_URL'),
        'secret' => env('PRODUCTS_SERVICE_SECRET'),
    ],
    'orders' => [
        'base_uri' => env('ORDERS_SERVICE_BASE_URL'),
        'secret' => env('ORDERS_SERVICE_SECRET'),
    ]
];