<?php

declare(strict_types=1);

namespace Tests\Support;

use Hypervel\Testing\PHPUnit\AfterEachTestCleanup;

class TestState
{
    /**
     * Register application test-state cleanup.
     */
    public static function register(): void
    {
        AfterEachTestCleanup::flushUsing('app', fn () => static::flushState());
    }

    /**
     * Flush application static state.
     */
    public static function flushState(): void
    {
        //
    }
}
