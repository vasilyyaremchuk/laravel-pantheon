<?php

/**
 * This script runs on Pantheon after code deployment
 */

// Create storage structure if it doesn't exist
$storage_dirs = [
    '/files/storage',
    '/files/storage/logs',
    '/files/storage/framework',
    '/files/storage/framework/cache',
    '/files/storage/framework/sessions',
    '/files/storage/framework/views',
    '/files/bootstrap',
    '/files/bootstrap/cache',
];

foreach ($storage_dirs as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
}

// Create symlinks if they don't exist
$links = [
    'storage' => '/files/storage',
    'bootstrap/cache' => '/files/bootstrap/cache',
];

foreach ($links as $link => $target) {
    if (!is_link($link)) {
        // Remove the directory if it exists
        if (is_dir($link)) {
            exec('rm -rf ' . escapeshellarg($link));
        }
        // Create the symlink
        symlink($target, $link);
    }
}

// Set proper permissions
exec('chmod -R 755 /files/storage');
exec('chmod -R 755 /files/bootstrap');

echo "Pantheon deployment setup completed successfully.\n";
