<?php

use App\Http\Middleware\EnsureIsAdmin;
use App\Http\Middleware\EnsureIsKaryawan;
use App\Http\Middleware\HandleRememberMe;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {

        $middleware->alias([
            'isadmin'=>EnsureIsAdmin::class,
            'iskaryawan'=>EnsureIsKaryawan::class,
            'remember'=>HandleRememberMe::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {

    })->create();
