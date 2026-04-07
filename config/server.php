<?php

declare(strict_types=1);

use Hypervel\Server\Event;
use Hypervel\Server\Server;
use Swoole\Constant;

return [

    /*
    |--------------------------------------------------------------------------
    | Server Mode
    |--------------------------------------------------------------------------
    */

    'mode' => SWOOLE_PROCESS,

    /*
    |--------------------------------------------------------------------------
    | Servers
    |--------------------------------------------------------------------------
    */

    'servers' => [
        [
            'name' => 'http',
            'type' => Server::SERVER_HTTP,
            'host' => env('HTTP_SERVER_HOST', '0.0.0.0'),
            'port' => (int) env('HTTP_SERVER_PORT', 9501),
            'sock_type' => SWOOLE_SOCK_TCP,
            'callbacks' => [
                Event::ON_REQUEST => [Hypervel\HttpServer\Server::class, 'onRequest'],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Server Settings
    |--------------------------------------------------------------------------
    |
    | Swoole server options passed directly to $server->set(). See:
    | https://wiki.swoole.com/en/#/server/setting
    |
    */

    'settings' => [
        'document_root' => base_path('public'),
        'enable_static_handler' => true,
        Constant::OPTION_ENABLE_COROUTINE => true,
        Constant::OPTION_WORKER_NUM => env('SERVER_WORKERS_NUMBER', swoole_cpu_num()),
        Constant::OPTION_PID_FILE => storage_path('framework/hypervel.pid'),
        Constant::OPTION_OPEN_TCP_NODELAY => true,
        Constant::OPTION_MAX_COROUTINE => 100000,
        Constant::OPTION_OPEN_HTTP2_PROTOCOL => true,
        Constant::OPTION_MAX_REQUEST => 100000,
        Constant::OPTION_MAX_WAIT_TIME => 3,
        Constant::OPTION_SOCKET_BUFFER_SIZE => 2 * 1024 * 1024,
        Constant::OPTION_BUFFER_OUTPUT_SIZE => 2 * 1024 * 1024,

        // Disabled by default — when behind a reverse proxy (nginx), Swoole
        // compression is wasted CPU since the proxy decompresses and
        // re-compresses for the client. Enable for direct-to-client setups.
        Constant::OPTION_HTTP_COMPRESSION => (bool) env('SERVER_HTTP_COMPRESSION', false),
    ],

    /*
    |--------------------------------------------------------------------------
    | Server Callbacks
    |--------------------------------------------------------------------------
    */

    'callbacks' => [
        Event::ON_WORKER_START => [Hypervel\Core\Bootstrap\WorkerStartCallback::class, 'onWorkerStart'],
        Event::ON_PIPE_MESSAGE => [Hypervel\Core\Bootstrap\PipeMessageCallback::class, 'onPipeMessage'],
        Event::ON_WORKER_EXIT => [Hypervel\Core\Bootstrap\WorkerExitCallback::class, 'onWorkerExit'],
    ],

];
