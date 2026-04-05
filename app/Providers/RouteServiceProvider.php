<?php

declare(strict_types=1);

namespace App\Providers;

use Hypervel\Foundation\Support\Providers\RouteServiceProvider as BaseServiceProvider;
use Hypervel\Support\Facades\Route;

class RouteServiceProvider extends BaseServiceProvider
{
    public function boot(): void
    {
        parent::boot();

        Route::middleware('api')
            ->prefix('api')
            ->group(base_path('routes/api.php'));

        Route::middleware('web')
            ->group(base_path('routes/web.php'));
    }
}
