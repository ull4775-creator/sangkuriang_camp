<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

// FIX VERCEL: Deteksi environment serverless & arahkan storage ke /tmp
$isVercel = getenv('VERCEL') === '1' 
         || getenv('IS_VERCEL') === '1' 
         || str_contains(getenv('HOME') ?? '', '/var/task');

if ($isVercel) {
    $tmpDirs = [
        '/tmp/storage',
        '/tmp/storage/framework',
        '/tmp/storage/framework/cache',
        '/tmp/storage/framework/sessions', 
        '/tmp/storage/framework/views',
        '/tmp/storage/logs',
    ];
    
    foreach ($tmpDirs as $dir) {
        if (!is_dir($dir)) @mkdir($dir, 0755, true);
    }
    
    $_ENV['LARAVEL_STORAGE_PATH'] = '/tmp/storage';
}

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->shouldRenderJsonWhen(
            fn (Request $request) => $request->is('api/*'),
        );
    })->create();