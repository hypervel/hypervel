<?php

declare(strict_types=1);

use Hypervel\Signal\WorkerStopHandler;

return [
    /*
    |--------------------------------------------------------------------------
    | Signal Handlers
    |--------------------------------------------------------------------------
    |
    | Register signal handler classes that will be resolved when the server
    | starts. Each handler implements SignalHandlerInterface and defines
    | which signals it listens for and how to handle them.
    |
    | Handlers can be registered with a priority (numeric value). Higher
    | priority handlers are initialized first. Use class name as the key
    | and priority as the value, or just list the class name for default
    | priority (0).
    |
    */

    'handlers' => [
        WorkerStopHandler::class => PHP_INT_MIN,
    ],

    /*
    |--------------------------------------------------------------------------
    | Signal Wait Timeout
    |--------------------------------------------------------------------------
    |
    | The timeout in seconds for each signal wait iteration. The signal
    | listener coroutine will wait for this duration before checking if
    | the manager has been stopped. Lower values mean faster shutdown
    | response but slightly more CPU usage.
    |
    */

    'timeout' => 5.0,
];
