<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class PantheonServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Override storage path if configured
        if ($storagePath = config('pantheon.storage_path')) {
            $this->app->useStoragePath($storagePath);
        }

        // Override cache path if configured
        if ($cachePath = config('pantheon.cache_path')) {
            $this->app->useBootstrapPath(dirname($cachePath));
            if (!file_exists($cachePath)) {
                mkdir($cachePath, 0755, true);
            }
        }
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
