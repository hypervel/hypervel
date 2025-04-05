<?php

declare(strict_types=1);

use Hypervel\Support\ServiceProvider;
use Psr\Log\LogLevel;

return [
    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your application. This value is used when the
    | framework needs to place the application's name in a notification or
    | any other location as required by the application or its packages.
    |
    */

    'name' => env('APP_NAME', 'Hypervel'),

    /*
    |--------------------------------------------------------------------------
    | Application Environment
    |--------------------------------------------------------------------------
    |
    | This value determines the "environment" your application is currently
    | running in. This may determine how you prefer to configure various
    | services the application utilizes. Set "APP_ENV" in your ".env" file.
    |
    */

    'env' => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    |
    | When your application is in debug mode, detailed error messages with
    | stack traces will be shown on every error that occurs within your
    | application. If disabled, a simple generic error page is shown.
    | Set "APP_DEBUG" in your ".env" file.
    |
    */

    'debug' => (bool) env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | Cacheable Flag for Annotations Scanning
    |--------------------------------------------------------------------------
    |
    | Enabling this option will cache the annotations scanning result. It
    | can boost the performance of the framework initialization.
    | Please disable it in the development environment.
    |
    */
    'scan_cacheable' => env('SCAN_CACHEABLE', false),

    /*
    |--------------------------------------------------------------------------
    | Log Levels for StdoutLogger
    |--------------------------------------------------------------------------
    |
    | This value only determines the log levels that are written to the stdout logger.
    | It does not affect the log levels that are written to the other loggers.
    |
    */
    'stdout_log_level' => [
        LogLevel::ALERT,
        LogLevel::CRITICAL,
        // LogLevel::DEBUG,
        LogLevel::EMERGENCY,
        LogLevel::ERROR,
        LogLevel::INFO,
        LogLevel::NOTICE,
        LogLevel::WARNING,
    ],

    /*
    |--------------------------------------------------------------------------
    | Debug Mode for Command Errors
    |--------------------------------------------------------------------------
    |
    | This value determines whether the stack strace will be displayed
    | when errors occur in the command line.
    |
    */

    'command_debug_enabled' => env('COMMAND_DEBUG_ENABLED', false),

    /*
    |--------------------------------------------------------------------------
    | Application URL
    |--------------------------------------------------------------------------
    |
    | This URL is used by the console to properly generate URLs when using
    | the Artisan command line tool. You should set this to the root of
    | your application so that it is used when running Artisan tasks.
    |
    */

    'url' => env('APP_URL', 'http://localhost'),

    /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default timezone for your application, which
    | will be used by the PHP date and date-time functions. We have gone
    | ahead and set this to a sensible default for you out of the box.
    |
    */

    'timezone' => env('APP_TIMEZONE', 'UTC'),

    /*
    |--------------------------------------------------------------------------
    | Application Locale Configuration
    |--------------------------------------------------------------------------
    |
    | The application locale determines the default locale that will be used
    | by the translation service provider. You are free to set this value
    | to any of the locales which will be supported by the application.
    |
    */

    'locale' => env('APP_LOCALE', 'en'),

    'fallback_locale' => env('APP_FALLBACK_LOCALE', 'en'),

    /*
    |--------------------------------------------------------------------------
    | Encryption Key
    |--------------------------------------------------------------------------
    |
    | This key is utilized by Laravel's encryption services and should be set
    | to a random, 32 character string to ensure that all encrypted values
    | are secure. You should do this prior to deploying the application.
    |
    */

    'cipher' => 'AES-256-CBC',

    'key' => env('APP_KEY'),

    'previous_keys' => [
        ...array_filter(
            explode(',', env('APP_PREVIOUS_KEYS', ''))
        ),
    ],

    'providers' => ServiceProvider::defaultProviders()->merge([
        /*
         * Package Service Providers...
         */

        /*
         * Application Service Providers...
         */
        App\Providers\AppServiceProvider::class,
        // App\Providers\BroadcastServiceProvider::class,
        App\Providers\EventServiceProvider::class,
        App\Providers\RouteServiceProvider::class,
    ])->toArray(),

    'aliases' => [
        'App' => Hypervel\Support\Facades\App::class,
        'Artisan' => Hypervel\Support\Facades\Artisan::class,
        'Auth' => Hypervel\Support\Facades\Auth::class,
        'Blade' => Hypervel\Support\Facades\Blade::class,
        'Broadcast' => Hypervel\Support\Facades\Broadcast::class,
        'Bus' => Hypervel\Support\Facades\Bus::class,
        'Cache' => Hypervel\Support\Facades\Cache::class,
        'Config' => Hypervel\Support\Facades\Config::class,
        'Cookie' => Hypervel\Support\Facades\Cookie::class,
        'Crypt' => Hypervel\Support\Facades\Crypt::class,
        'Date' => Hypervel\Support\Facades\Date::class,
        'DB' => Hypervel\Support\Facades\DB::class,
        'Environment' => Hypervel\Support\Facades\Environment::class,
        'Event' => Hypervel\Support\Facades\Event::class,
        'File' => Hypervel\Support\Facades\File::class,
        'Gate' => Hypervel\Support\Facades\Gate::class,
        'Hash' => Hypervel\Support\Facades\Hash::class,
        'Http' => Hypervel\Support\Facades\Http::class,
        'JWT' => Hypervel\Support\Facades\JWT::class,
        'Lang' => Hypervel\Support\Facades\Lang::class,
        'Log' => Hypervel\Support\Facades\Log::class,
        'Mail' => Hypervel\Support\Facades\Mail::class,
        'Notification' => Hypervel\Support\Facades\Notification::class,
        'Process' => Hypervel\Support\Facades\Process::class,
        'Queue' => Hypervel\Support\Facades\Queue::class,
        'RateLimiter' => Hypervel\Support\Facades\RateLimiter::class,
        'Redis' => Hypervel\Support\Facades\Redis::class,
        'Request' => Hypervel\Support\Facades\Request::class,
        'Response' => Hypervel\Support\Facades\Response::class,
        'Route' => Hypervel\Support\Facades\Route::class,
        'Schedule' => Hypervel\Support\Facades\Schedule::class,
        'Session' => Hypervel\Support\Facades\Session::class,
        'Storage' => Hypervel\Support\Facades\Storage::class,
        'URL' => Hypervel\Support\Facades\URL::class,
        'Validator' => Hypervel\Support\Facades\Validator::class,
        'View' => Hypervel\Support\Facades\View::class,
    ],
];
