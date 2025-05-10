<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Pantheon Configuration
    |--------------------------------------------------------------------------
    |
    | This file contains Pantheon-specific configuration settings.
    |
    */

    'storage_path' => env('STORAGE_PATH', storage_path()),
    'cache_path' => env('CACHE_PATH', base_path('bootstrap/cache')),
];
