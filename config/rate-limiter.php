<?php

declare(strict_types=1);

return [
    /*
    |--------------------------------------------------------------------------
    | Default Rate Limiter Store
    |--------------------------------------------------------------------------
    |
    | This option controls the default store used by the rate limiter. The
    | database store provides shared state without requiring Redis, while
    | applications with higher throughput may select the Redis store.
    |
    */

    'default' => env('RATE_LIMITER_STORE', 'database'),

    /*
    |--------------------------------------------------------------------------
    | Rate Limiter Stores
    |--------------------------------------------------------------------------
    |
    | Here you may configure the stores used to hold rate limiter state. Each
    | store performs its decisions atomically using its native primitives.
    |
    | Supported drivers: "database", "redis", "swoole", "worker-array"
    |
    */

    'stores' => [
        'database' => [
            'driver' => 'database',
            'connection' => env('RATE_LIMITER_DB_CONNECTION'),
            'table' => env('RATE_LIMITER_DB_TABLE', 'rate_limits'),
        ],

        'redis' => [
            'driver' => 'redis',
            'connection' => env('RATE_LIMITER_REDIS_CONNECTION', 'default'),
        ],

        'swoole' => [
            'driver' => 'swoole',
            'rows' => (int) env('RATE_LIMITER_SWOOLE_ROWS', 65536),
            'conflict_proportion' => 0.2,
            'memory_limit_buffer' => 0.05,
            'prune_interval' => 60, // seconds
        ],

        // Do not use worker-array for application rate limiting. Its state is not
        // shared across workers or servers, and expired unused keys remain in
        // memory until the worker exits. Applications should select it only for
        // automated tests.
        'worker-array' => [
            'driver' => 'worker-array',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Rate Limiter Prefix
    |--------------------------------------------------------------------------
    |
    | This value namespaces limiter identities so applications sharing a store
    | do not share rate limit state. It is included before keys are hashed.
    |
    */

    'prefix' => env('RATE_LIMITER_PREFIX', app_id() . '_rate_limiter'),
];
