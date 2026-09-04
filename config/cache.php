<?php

declare(strict_types=1);

use Hypervel\Cache\SwooleStore;

return [
    /*
    |--------------------------------------------------------------------------
    | Default Cache Store
    |--------------------------------------------------------------------------
    |
    | This option controls the default cache connection that gets used while
    | using this caching library. This connection is used when another is
    | not explicitly specified when executing a given caching function.
    |
    */

    'default' => env('CACHE_STORE', 'database'),

    /*
    |--------------------------------------------------------------------------
    | Schedule Cache Store
    |--------------------------------------------------------------------------
    |
    | This store coordinates scheduled tasks across processes and servers.
    | Set it to null to use the default cache store.
    |
    */

    'schedule_store' => env('SCHEDULE_CACHE_STORE'),

    /*
    |--------------------------------------------------------------------------
    | Cache Stores
    |--------------------------------------------------------------------------
    |
    | Here you may define all of the cache "stores" for your application as
    | well as their drivers. You may even define multiple stores for the
    | same cache driver to group types of items stored in your caches.
    |
    | Supported drivers: "array", "worker-array", "database", "file",
    |                    "storage", "redis", "swoole", "stack", "session",
    |                    "failover", "null"
    |
    | Database, storage, and Redis stores may define a store-specific prefix;
    | omission or null inherits the global cache prefix. Nullable connection,
    | lock connection, and disk values select their manager's default.
    |
    | File stores use the operating system's permissions unless "permission"
    | sets one mode for cache files and generated directories. Cache repository
    | events are enabled by default; setting "events" to false disables them
    | for a store. The failover repository disables its outer events because
    | its backing stores dispatch them.
    |
    */

    'stores' => [
        'array' => [
            'driver' => 'array',
            'serialize' => false,
        ],

        'worker-array' => [
            'driver' => 'worker-array',
            'serialize' => false,
        ],

        'session' => [
            'driver' => 'session',
            'key' => env('SESSION_CACHE_KEY', '_cache'),
        ],

        'database' => [
            'driver' => 'database',
            'connection' => env('DB_CACHE_CONNECTION'),
            'table' => env('DB_CACHE_TABLE', 'cache'),
            'lock_connection' => env('DB_CACHE_LOCK_CONNECTION'),
            'lock_table' => env('DB_CACHE_LOCK_TABLE', 'cache_locks'),
            'lock_lottery' => [2, 100],
            'lock_timeout' => 86400,
        ],

        'file' => [
            'driver' => 'file',
            'path' => storage_path('framework/cache/data'),
            'lock_path' => storage_path('framework/cache/data'),
        ],

        'storage' => [
            'driver' => 'storage',
            'disk' => env('CACHE_STORAGE_DISK'),
            'path' => env('CACHE_STORAGE_PATH', 'framework/cache/data'),
        ],

        'redis' => [
            'driver' => 'redis',
            'connection' => env('REDIS_CACHE_CONNECTION', 'cache'),
            'tag_mode' => env('REDIS_CACHE_TAG_MODE', 'all'), // 'any' requires PhpRedis 6.3.0+ with Redis 8.0+ or Valkey 9.0+.
            'lock_connection' => env('REDIS_CACHE_LOCK_CONNECTION', 'cache'),
        ],

        'swoole' => [
            'driver' => 'swoole',
            'table' => 'default',
            'memory_limit_buffer' => 0.05,
            'eviction_policy' => SwooleStore::EVICTION_POLICY_LRU,
            'eviction_proportion' => 0.05,
            'eviction_interval' => 10000, // milliseconds
            'interval_refresh_interval' => 1000, // milliseconds
        ],

        'stack' => [
            'driver' => 'stack',
            'stores' => [
                'swoole' => [
                    'ttl' => 3, // seconds
                ],
                'redis',
            ],
        ],

        'failover' => [
            'driver' => 'failover',
            'stores' => [
                'database',
                'array',
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Serializable Classes
    |--------------------------------------------------------------------------
    |
    | This global value determines the classes that PHP cache stores may
    | unserialize. False allows only classes contributed by framework, package,
    | and application providers; an array also allows the classes listed here;
    | null or true allows every class. False is the secure default because
    | unserializing arbitrary classes can expose gadget chains when cache
    | payloads are forged. Native PhpRedis serializers handle deserialization
    | themselves, so this policy does not apply to those connections.
    |
    */

    'serializable_classes' => false,

    /*
    |--------------------------------------------------------------------------
    | Swoole Tables Configuration
    |--------------------------------------------------------------------------
    */

    'swoole_tables' => [
        'default' => [
            'rows' => 1024,
            'bytes' => 10240,
            'conflict_proportion' => 0.2,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Cache Key Prefix
    |--------------------------------------------------------------------------
    |
    | When utilizing the database or Redis cache stores, there might be other
    | applications using the same cache. For that reason, you may prefix
    | every cache key to avoid collisions.
    |
    */

    'prefix' => env('CACHE_PREFIX', app_id() . '_cache:'),
];
