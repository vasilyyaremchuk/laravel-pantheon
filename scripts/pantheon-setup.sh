#!/bin/bash

# Create necessary directories in files
mkdir -p /files/storage
mkdir -p /files/storage/logs
mkdir -p /files/storage/framework/views
mkdir -p /files/storage/framework/cache
mkdir -p /files/storage/framework/sessions
mkdir -p /files/bootstrap/cache

# Remove existing directories
rm -rf storage
rm -rf bootstrap/cache

# Create symlinks
ln -s /files/storage storage
ln -s /files/bootstrap/cache bootstrap/cache

# Set permissions
chmod -R 755 /files/storage
chmod -R 755 /files/bootstrap
