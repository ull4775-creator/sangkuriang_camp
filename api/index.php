<?php

// 1. Load Composer Autoload
require __DIR__ . '/../vendor/autoload.php';

// 2. Deteksi Environment Vercel & Arahkan Storage ke /tmp
$isVercel = getenv('VERCEL') === '1' 
         || getenv('IS_VERCEL') === '1' 
         || str_contains(getenv('HOME') ?? '', '/var/task');

if ($isVercel) {
    // Buat direktori temporary yang dibutuhkan Laravel
    $tmpDirs = [
        '/tmp/storage',
        '/tmp/storage/framework',
        '/tmp/storage/framework/cache',
        '/tmp/storage/framework/sessions', 
        '/tmp/storage/framework/views', // PENTING: Untuk cache blade
        '/tmp/storage/logs',
    ];
    
    foreach ($tmpDirs as $dir) {
        if (!is_dir($dir)) @mkdir($dir, 0755, true);
    }
    
    // Set environment variable agar Laravel pakai /tmp
    $_ENV['LARAVEL_STORAGE_PATH'] = '/tmp/storage';
    putenv('LARAVEL_STORAGE_PATH=/tmp/storage');
}

// 3. Bootstrap Aplikasi Laravel
$app = require_once __DIR__ . '/../bootstrap/app.php';

// 4. Handle Request & Response
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);
$response->send();
$kernel->terminate($request, $response);