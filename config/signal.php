<?php

declare(strict_types=1);

return [
    /*
    |--------------------------------------------------------------------------
    | Signal Handlers
    |--------------------------------------------------------------------------
    |
    | Register signal handler classes that are resolved when a worker or
    | server process starts. Each handler implements SignalHandler and
    | declares the signals it handles in workers, in server processes, or
    | in both.
    |
    | You may register handlers with a numeric priority. Higher-priority
    | handlers run first for the same signal. Use the class name as the key
    | and the priority as the value, or list the class name to use the
    | default priority of zero.
    |
    | No handlers are registered by default. Swoole manages normal worker
    | shutdown automatically, so add worker handlers only when your
    | application needs custom signal behavior. Graceful server-process
    | shutdown must be configured explicitly.
    |
    */

    'handlers' => [],
];
