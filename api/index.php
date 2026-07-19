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
        '/tmp/storage/framework/views', // KRUSIAL: Untuk cache Blade
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

// 4. FIX VERCEL: Paksa clear compiled views agar tidak error [view] does not exist
// Ini penting karena /tmp di Vercel kadang retain file corrupt antar deployment
if ($isVercel) {
    try {
        // Clear view finder cache
        $app->make('view')->getFinder()->flush();
        
        // Clear config cache jika ada
        if (file_exists('/tmp/storage/framework/config.php')) {
            @unlink('/tmp/storage/framework/config.php');
        }
    } catch (\Exception $e) {
        // Ignore error jika service belum ready
    }
}

// 5. Handle Request & Response
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);
$response->send();
$kernel->terminate($request, $response);