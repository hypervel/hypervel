<?php

declare(strict_types=1);

namespace App\Exceptions;

use Hypervel\Foundation\Exceptions\Handler as ExceptionHandler;
use Hypervel\Http\Request;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected array $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->shouldRenderJsonWhen(function (Request $request, Throwable $e) {
            $path = $request->path();

            // API routes always return JSON
            if (str_starts_with($path, 'api') && (strlen($path) === 3 || $path[3] === '/')) {
                return true;
            }

            // Fall back to content negotiation
            return $request->expectsJson();
        });

        $this->reportable(function (Throwable $e) {
        });
    }
}
