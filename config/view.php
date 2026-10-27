<?php

declare(strict_types=1);

return [
    /*
    |--------------------------------------------------------------------------
    | View Storage Paths
    |--------------------------------------------------------------------------
    |
    | Most templating systems load templates from disk. Here you may specify
    | an array of paths that should be checked for your views. Of course
    | the usual Hypervel view path has already been registered for you.
    |
    */

    'paths' => [
        resource_path('views'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Compiled View Path
    |--------------------------------------------------------------------------
    |
    | This option determines where all the compiled Blade templates will be
    | stored for your application. Typically, this is within the storage
    | directory. However, as usual, you are free to change this value.
    |
    */

    'compiled' => env(
        'VIEW_COMPILED_PATH',
        realpath(storage_path('framework/views')) ?: storage_path('framework/views')
    ),

    /*
    |--------------------------------------------------------------------------
    | Relative View Hashes
    |--------------------------------------------------------------------------
    |
    | When this option is enabled, compiled view names are hashed relative to
    | the application's base path. This keeps the names stable when the same
    | application is deployed to a different absolute path.
    |
    */

    'relative_hash' => false,

    /*
    |--------------------------------------------------------------------------
    | Compiled View Cache
    |--------------------------------------------------------------------------
    |
    | This option determines whether compiled views may be reused. Disabling
    | the cache causes Blade templates to be compiled before every render.
    |
    */

    'cache' => true,

    /*
    |--------------------------------------------------------------------------
    | Compiled View Extension
    |--------------------------------------------------------------------------
    |
    | This option controls the file extension used for compiled Blade views.
    |
    */

    'compiled_extension' => 'php',

    /*
    |--------------------------------------------------------------------------
    | Compiled View Timestamps
    |--------------------------------------------------------------------------
    |
    | When enabled, Blade compares source and compiled modification times to
    | determine whether a view should be compiled again.
    |
    */

    'check_cache_timestamps' => true,
];
