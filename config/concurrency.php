<?php

declare(strict_types=1);

return [
    /*
    |--------------------------------------------------------------------------
    | Default Concurrency Driver
    |--------------------------------------------------------------------------
    |
    | This option determines the default concurrency driver that will be used
    | by Hypervel's concurrency functions. Coroutine concurrency is fundamental
    | to Hypervel's Swoole architecture. Changing this default is almost never
    | appropriate. Use the process or sync drivers explicitly via
    | Concurrency::driver() when needed.
    |
    | Supported: "coroutine", "process", "sync"
    |
    */

    'default' => 'coroutine',
];
