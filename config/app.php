<?php

declare(strict_types=1);

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

    'name' => env('APP_NAME', 'Laravel Hyperf'),

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

    'env' => app()->environment(),

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

    'debug' => app()->hasDebugModeEnabled(),

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

    'providers' => [
        SwooleTW\Hyperf\Foundation\Providers\FoundationServiceProvider::class,
        SwooleTW\Hyperf\Foundation\Providers\FormRequestServiceProvider::class,
        App\Providers\RouteServiceProvider::class,
        App\Providers\AppServiceProvider::class,
        App\Providers\EventServiceProvider::class,
    ],

    'aliases' => [
        'App' => SwooleTW\Hyperf\Support\Facades\App::class,
        'Artisan' => SwooleTW\Hyperf\Support\Facades\Artisan::class,
        'Auth' => SwooleTW\Hyperf\Support\Facades\Auth::class,
        'Blade' => SwooleTW\Hyperf\Support\Facades\Blade::class,
        'Bus' => SwooleTW\Hyperf\Support\Facades\Bus::class,
        'Cache' => SwooleTW\Hyperf\Support\Facades\Cache::class,
        'Config' => SwooleTW\Hyperf\Support\Facades\Config::class,
        'Cookie' => SwooleTW\Hyperf\Support\Facades\Cookie::class,
        'Crypt' => SwooleTW\Hyperf\Support\Facades\Crypt::class,
        'Date' => SwooleTW\Hyperf\Support\Facades\Date::class,
        'DB' => SwooleTW\Hyperf\Support\Facades\DB::class,
        'Environment' => SwooleTW\Hyperf\Support\Facades\Environment::class,
        'Event' => SwooleTW\Hyperf\Support\Facades\Event::class,
        'File' => SwooleTW\Hyperf\Support\Facades\File::class,
        'Gate' => SwooleTW\Hyperf\Support\Facades\Gate::class,
        'Hash' => SwooleTW\Hyperf\Support\Facades\Hash::class,
        'Http' => SwooleTW\Hyperf\Support\Facades\Http::class,
        'JWT' => SwooleTW\Hyperf\Support\Facades\JWT::class,
        'Lang' => SwooleTW\Hyperf\Support\Facades\Lang::class,
        'Log' => SwooleTW\Hyperf\Support\Facades\Log::class,
        'Mail' => SwooleTW\Hyperf\Support\Facades\Mail::class,
        'Notification' => SwooleTW\Hyperf\Support\Facades\Notification::class,
        'Queue' => SwooleTW\Hyperf\Support\Facades\Queue::class,
        'RateLimiter' => SwooleTW\Hyperf\Support\Facades\RateLimiter::class,
        'Redis' => SwooleTW\Hyperf\Support\Facades\Redis::class,
        'Request' => SwooleTW\Hyperf\Support\Facades\Request::class,
        'Response' => SwooleTW\Hyperf\Support\Facades\Response::class,
        'Route' => SwooleTW\Hyperf\Support\Facades\Route::class,
        'Schedule' => SwooleTW\Hyperf\Support\Facades\Schedule::class,
        'Session' => SwooleTW\Hyperf\Support\Facades\Session::class,
        'Storage' => SwooleTW\Hyperf\Support\Facades\Storage::class,
        'URL' => SwooleTW\Hyperf\Support\Facades\URL::class,
        'Validator' => SwooleTW\Hyperf\Support\Facades\Validator::class,
        'View' => SwooleTW\Hyperf\Support\Facades\View::class,
    ],
];
