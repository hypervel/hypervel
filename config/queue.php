<?php

declare(strict_types=1);

return [
    /*
    |--------------------------------------------------------------------------
    | Default Queue Connection Name
    |--------------------------------------------------------------------------
    |
    | Hypervel's queue supports a variety of backends via a single, unified
    | API, giving you convenient access to each backend using identical
    | syntax for each. The default queue connection is defined below.
    |
    */

    'default' => env('QUEUE_CONNECTION', 'database'),

    /*
    |--------------------------------------------------------------------------
    | Concurrency Number
    |--------------------------------------------------------------------------
    |
    | This value determines the number of jobs that will be processed at once
    | by every worker.
    |
    */
    'concurrency' => (int) env('QUEUE_CONCURRENCY', 1),

    /*
    |--------------------------------------------------------------------------
    | Queue Connections
    |--------------------------------------------------------------------------
    |
    | Here you may configure the connection options for every queue backend
    | used by your application. An example configuration is provided for
    | each backend supported by Hypervel. You're also free to add more.
    |
    | Drivers: "sync", "background", "deferred", "database", "beanstalkd", "sqs", "redis", "failover", "null"
    |
    | Omitting a database or Redis connection selects the corresponding
    | default connection. Database, Beanstalkd, and Redis retry timeouts
    | default to 60 seconds when omitted. Connection records for drivers
    | without named queues may omit the "queue" member. The sync, background,
    | and deferred drivers do not support configurable queue names and ignore
    | a "queue" member on their connections.
    |
    | Except for sync and database, a dispatch waits for the most recently
    | started applicable transaction and its enclosing stack to commit.
    | Database queue inserts remain in the business transaction by default;
    | enable after-commit dispatch when the queue does not share every
    | connection whose transactional data the job depends on. Failover waits
    | for every applicable transaction so failures remain in its fallback chain.
    |
    */

    'connections' => [
        'sync' => [
            'driver' => 'sync',
            'after_commit' => false,
        ],

        'background' => [
            'driver' => 'background',
            'after_commit' => true,
        ],

        'deferred' => [
            'driver' => 'deferred',
            'after_commit' => true,
        ],

        'database' => [
            'driver' => 'database',
            'connection' => env('DB_QUEUE_CONNECTION'),
            'table' => env('DB_QUEUE_TABLE', 'jobs'),
            'queue' => env('DB_QUEUE', 'default'),
            'retry_after' => (int) env('DB_QUEUE_RETRY_AFTER', 90),
            'after_commit' => false,
        ],

        'beanstalkd' => [
            'driver' => 'beanstalkd',
            'host' => env('BEANSTALKD_QUEUE_HOST', 'localhost'),
            'port' => (int) env('BEANSTALKD_QUEUE_PORT', 11300),
            'queue' => env('BEANSTALKD_QUEUE', 'default'),
            'retry_after' => (int) env('BEANSTALKD_QUEUE_RETRY_AFTER', 90),
            'block_for' => 0,
            'after_commit' => true,
            'pool' => [
                'min_retained_objects' => 1,
                'max_objects' => 10,
                'wait_timeout' => 3.0,
                'max_lifetime' => 60.0,
                'max_idle_time' => 0.0,
                'idle_ttl' => 300.0,
            ],
        ],

        'sqs' => [
            'driver' => 'sqs',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'token' => env('AWS_SESSION_TOKEN'),
            'prefix' => env('SQS_PREFIX', 'https://sqs.us-east-1.amazonaws.com/your-account-id'),
            'queue' => env('SQS_QUEUE', 'default'),
            'suffix' => env('SQS_SUFFIX'),
            'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
            'after_commit' => true,
            'overflow' => [
                'enabled' => (bool) env('SQS_OVERFLOW_ENABLED', false),
                'store' => env('SQS_OVERFLOW_STORE'),
                'always' => false,
                'delete_after_processing' => true,
                'flush_on_clear' => (bool) env('SQS_OVERFLOW_FLUSH_ON_CLEAR', false),
            ],
            'pool' => [
                'min_retained_objects' => 1,
                'max_objects' => 10,
                'wait_timeout' => 3.0,
                'max_lifetime' => 60.0,
                'max_idle_time' => 0.0,
                'idle_ttl' => 300.0,
            ],
        ],

        'redis' => [
            'driver' => 'redis',
            'connection' => env('REDIS_QUEUE_CONNECTION', 'queue'),
            'queue' => env('REDIS_QUEUE', 'default'),
            'retry_after' => (int) env('REDIS_QUEUE_RETRY_AFTER', 90),
            'block_for' => null,
            'after_commit' => true,
        ],

        'failover' => [
            'driver' => 'failover',
            'connections' => [
                'database',
                'deferred',
            ],
            'after_commit' => true,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Job Batching
    |--------------------------------------------------------------------------
    |
    | The following options configure the database and table that store job
    | batching information. These options can be updated to any database
    | connection and table which has been defined by your application.
    |
    */

    'batching' => [
        'database' => env('DB_CONNECTION', 'sqlite'),
        'table' => 'job_batches',
    ],

    /*
    |--------------------------------------------------------------------------
    | Failed Queue Jobs
    |--------------------------------------------------------------------------
    |
    | These options configure the behavior of failed queue job logging so you
    | can control how and where failed jobs are stored. Hypervel ships with
    | support for storing failed jobs in a simple file or in a database.
    |
    | Supported drivers: "database", "database-uuids", "file", "null"
    |
    | Database drivers require "database" and "table". A null "database" uses
    | the default database connection. The file driver uses a "path" and
    | "limit" instead; omitting them stores up to 100 failures in
    | storage/framework/cache/failed-jobs.json.
    |
    */

    'failed' => [
        'driver' => env('QUEUE_FAILED_DRIVER', 'database-uuids'),
        'database' => env('DB_CONNECTION', 'sqlite'),
        'table' => 'failed_jobs',
    ],
];
