<?php

declare(strict_types=1);

use Hypervel\Server\Event;
use Hypervel\Server\Server;
use Swoole\Constant;

return [
    'mode' => SWOOLE_PROCESS,
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
            'options' => [
                // Enable request lifecycle events (used by Telescope, etc.)
                'enable_request_lifecycle' => false,
            ],
        ],

        // Uncomment to enable the WebSocket server on port 9502.
        // [
        //     'name' => 'ws',
        //     'type' => Server::SERVER_WEBSOCKET,
        //     'host' => env('WS_SERVER_HOST', '0.0.0.0'),
        //     'port' => (int) env('WS_SERVER_PORT', 9502),
        //     'sock_type' => SWOOLE_SOCK_TCP,
        //     'callbacks' => [
        //         Event::ON_HAND_SHAKE => [Hypervel\Foundation\Http\WebsocketKernel::class, 'onHandShake'],
        //         Event::ON_MESSAGE => [Hypervel\Foundation\Http\WebsocketKernel::class, 'onMessage'],
        //         Event::ON_CLOSE => [Hypervel\Foundation\Http\WebsocketKernel::class, 'onClose'],
        //     ],
        // ],
    ],
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
        Constant::OPTION_SOCKET_BUFFER_SIZE => 2 * 1024 * 1024,
        Constant::OPTION_BUFFER_OUTPUT_SIZE => 2 * 1024 * 1024,
    ],
    'callbacks' => [
        Event::ON_WORKER_START => [Hypervel\Framework\Bootstrap\WorkerStartCallback::class, 'onWorkerStart'],
        Event::ON_PIPE_MESSAGE => [Hypervel\Framework\Bootstrap\PipeMessageCallback::class, 'onPipeMessage'],
        Event::ON_WORKER_EXIT => [Hypervel\Framework\Bootstrap\WorkerExitCallback::class, 'onWorkerExit'],
    ],
];
