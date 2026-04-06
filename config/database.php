<?php

declare(strict_types=1);

use Hypervel\Support\Str;

return [
    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for database operations. This is
    | the connection which will be utilized unless another connection
    | is explicitly specified when you execute a query / statement.
    |
    */

    'default' => env('DB_CONNECTION', 'sqlite'),

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Below are all of the database connections defined for your application.
    | An example configuration is provided for each database system which
    | is supported by Hypervel. You're free to add / remove connections.
    |
    */

    'connections' => [
        'sqlite' => [
            'driver' => 'sqlite',
            'url' => env('DATABASE_URL'),
            'database' => env('DB_DATABASE', database_path('database.sqlite')),
            'prefix' => '',
            'prefix_indexes' => null,
            'foreign_key_constraints' => env('DB_FOREIGN_KEYS', true),
            'busy_timeout' => null,
            'journal_mode' => null,
            'synchronous' => null,
            'transaction_mode' => 'DEFERRED',
            'pragmas' => [],
        ],

        'mysql' => [
            'driver' => 'mysql',
            'url' => env('DB_URL'),
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', 3306),
            'database' => env('DB_DATABASE', 'hypervel'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => env('DB_CHARSET', 'utf8mb4'),
            'collation' => env('DB_COLLATION', 'utf8mb4_unicode_ci'),
            'prefix' => env('DB_PREFIX', ''),
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                (PHP_VERSION_ID >= 80500 ? Pdo\Mysql::ATTR_SSL_CA : PDO::MYSQL_ATTR_SSL_CA) => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
            'pool' => [
                'min_connections' => (int) env('DB_MIN_CONNECTIONS', 1),
                'max_connections' => (int) env('DB_MAX_CONNECTIONS', 10),
                'connect_timeout' => 10.0,
                'wait_timeout' => 3.0,
                'heartbeat' => -1,
                'max_idle_time' => (float) env('DB_MAX_IDLE_TIME', 60),
            ],
        ],

        'mariadb' => [
            'driver' => 'mariadb',
            'url' => env('DB_URL'),
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', 3306),
            'database' => env('DB_DATABASE', 'hypervel'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => env('DB_CHARSET', 'utf8mb4'),
            'collation' => env('DB_COLLATION', 'utf8mb4_unicode_ci'),
            'prefix' => env('DB_PREFIX', ''),
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                (PHP_VERSION_ID >= 80500 ? Pdo\Mysql::ATTR_SSL_CA : PDO::MYSQL_ATTR_SSL_CA) => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
            'pool' => [
                'min_connections' => (int) env('DB_MIN_CONNECTIONS', 1),
                'max_connections' => (int) env('DB_MAX_CONNECTIONS', 10),
                'connect_timeout' => 10.0,
                'wait_timeout' => 3.0,
                'heartbeat' => -1,
                'max_idle_time' => (float) env('DB_MAX_IDLE_TIME', 60),
            ],
        ],

        'pgsql' => [
            'driver' => 'pgsql',
            'url' => env('DB_URL'),
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', 5432),
            'database' => env('DB_DATABASE', 'hypervel'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => env('DB_CHARSET', 'utf8'),
            'prefix' => env('DB_PREFIX', ''),
            'prefix_indexes' => true,
            'search_path' => 'public',
            'sslmode' => env('DB_SSLMODE', 'prefer'),
            'options' => [
                PDO::ATTR_EMULATE_PREPARES => true,
            ],
            'pool' => [
                'min_connections' => (int) env('DB_MIN_CONNECTIONS', 1),
                'max_connections' => (int) env('DB_MAX_CONNECTIONS', 10),
                'connect_timeout' => 10.0,
                'wait_timeout' => 3.0,
                'heartbeat' => -1,
                'max_idle_time' => (float) env('DB_MAX_IDLE_TIME', 60),
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | This table keeps track of all the migrations that have already run for
    | your application. Using this information, we can determine which of
    | the migrations on disk haven't actually been run on the database.
    |
    */

    'migrations' => [
        'table' => 'migrations',
        'update_date_on_publish' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    |
    | Redis is an open source, fast, and advanced key-value store that also
    | provides a richer body of commands than a typical key-value system
    | such as Memcached. You may define your connection settings here.
    |
    */

    'redis' => [
        'options' => [
            'prefix' => env('REDIS_PREFIX', Str::slug((string) env('APP_NAME', 'hypervel'), '_') . '_database_'),
        ],

        'default' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', 'localhost'),
            'username' => env('REDIS_USERNAME'),
            'password' => env('REDIS_PASSWORD'),
            'port' => (int) env('REDIS_PORT', 6379),
            'database' => (int) env('REDIS_DB', 0),
            'pool' => [
                'min_connections' => (int) env('REDIS_MIN_CONNECTIONS', 1),
                'max_connections' => (int) env('REDIS_MAX_CONNECTIONS', 10),
                'connect_timeout' => 10.0,
                'wait_timeout' => 3.0,
                'heartbeat' => -1,
                'max_idle_time' => (float) env('REDIS_MAX_IDLE_TIME', 60),
            ],
        ],

        'cache' => [
            'url' => env('REDIS_CACHE_URL', env('REDIS_URL')),
            'host' => env('REDIS_CACHE_HOST', env('REDIS_HOST', 'localhost')),
            'username' => env('REDIS_CACHE_USERNAME', env('REDIS_USERNAME')),
            'password' => env('REDIS_CACHE_PASSWORD', env('REDIS_PASSWORD')),
            'port' => (int) env('REDIS_CACHE_PORT', env('REDIS_PORT', 6379)),
            'database' => (int) env('REDIS_CACHE_DB', env('REDIS_DB', 0)),
            'pool' => [
                'min_connections' => (int) env('REDIS_CACHE_MIN_CONNECTIONS', env('REDIS_MIN_CONNECTIONS', 1)),
                'max_connections' => (int) env('REDIS_CACHE_MAX_CONNECTIONS', env('REDIS_MAX_CONNECTIONS', 10)),
                'connect_timeout' => 10.0,
                'wait_timeout' => 3.0,
                'heartbeat' => -1,
                'max_idle_time' => (float) env('REDIS_CACHE_MAX_IDLE_TIME', env('REDIS_MAX_IDLE_TIME', 60)),
            ],
        ],

        'session' => [
            'url' => env('REDIS_SESSION_URL', env('REDIS_URL')),
            'host' => env('REDIS_SESSION_HOST', env('REDIS_HOST', 'localhost')),
            'username' => env('REDIS_SESSION_USERNAME', env('REDIS_USERNAME')),
            'password' => env('REDIS_SESSION_PASSWORD', env('REDIS_PASSWORD')),
            'port' => (int) env('REDIS_SESSION_PORT', env('REDIS_PORT', 6379)),
            'database' => (int) env('REDIS_SESSION_DB', env('REDIS_DB', 0)),
            'pool' => [
                'min_connections' => (int) env('REDIS_SESSION_MIN_CONNECTIONS', env('REDIS_MIN_CONNECTIONS', 1)),
                'max_connections' => (int) env('REDIS_SESSION_MAX_CONNECTIONS', env('REDIS_MAX_CONNECTIONS', 10)),
                'connect_timeout' => 10.0,
                'wait_timeout' => 3.0,
                'heartbeat' => -1,
                'max_idle_time' => (float) env('REDIS_SESSION_MAX_IDLE_TIME', env('REDIS_MAX_IDLE_TIME', 60)),
            ],
        ],

        'queue' => [
            'url' => env('REDIS_QUEUE_URL', env('REDIS_URL')),
            'host' => env('REDIS_QUEUE_HOST', env('REDIS_HOST', 'localhost')),
            'username' => env('REDIS_QUEUE_USERNAME', env('REDIS_USERNAME')),
            'password' => env('REDIS_QUEUE_PASSWORD', env('REDIS_PASSWORD')),
            'port' => (int) env('REDIS_QUEUE_PORT', env('REDIS_PORT', 6379)),
            'database' => (int) env('REDIS_QUEUE_DB', env('REDIS_DB', 0)),
            'pool' => [
                'min_connections' => (int) env('REDIS_QUEUE_MIN_CONNECTIONS', env('REDIS_MIN_CONNECTIONS', 1)),
                'max_connections' => (int) env('REDIS_QUEUE_MAX_CONNECTIONS', env('REDIS_MAX_CONNECTIONS', 10)),
                'connect_timeout' => 10.0,
                'wait_timeout' => 3.0,
                'heartbeat' => -1,
                'max_idle_time' => (float) env('REDIS_QUEUE_MAX_IDLE_TIME', env('REDIS_MAX_IDLE_TIME', 60)),
            ],
        ],

        'reverb' => [
            'url' => env('REDIS_REVERB_URL', env('REDIS_URL')),
            'host' => env('REDIS_REVERB_HOST', env('REDIS_HOST', 'localhost')),
            'username' => env('REDIS_REVERB_USERNAME', env('REDIS_USERNAME')),
            'password' => env('REDIS_REVERB_PASSWORD', env('REDIS_PASSWORD')),
            'port' => (int) env('REDIS_REVERB_PORT', env('REDIS_PORT', 6379)),
            'database' => (int) env('REDIS_REVERB_DB', env('REDIS_DB', 0)),
            'pool' => [
                'min_connections' => (int) env('REDIS_REVERB_MIN_CONNECTIONS', env('REDIS_MIN_CONNECTIONS', 1)),
                'max_connections' => (int) env('REDIS_REVERB_MAX_CONNECTIONS', env('REDIS_MAX_CONNECTIONS', 10)),
                'connect_timeout' => 10.0,
                'wait_timeout' => 3.0,
                'heartbeat' => -1,
                'max_idle_time' => (float) env('REDIS_REVERB_MAX_IDLE_TIME', env('REDIS_MAX_IDLE_TIME', 60)),
            ],
        ],
    ],
];
