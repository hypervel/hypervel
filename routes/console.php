<?php

declare(strict_types=1);

use Hypervel\Support\Facades\Artisan;
use Hypervel\Support\Facades\Schedule;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| Define your closure-based console commands here.
|
*/

Artisan::command('hello', function () {
    $this->comment('Hypervel is awesome!');
})->purpose('This is a demo closure command.');

// Schedule::command('hello')->everyFiveSeconds();
