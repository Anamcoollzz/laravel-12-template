<?php

use App\Http\Middleware\CheckLaravelVersionMiddleware;
use App\Http\Middleware\EducationLevelMiddleware;
use App\Http\Middleware\EnsureAppKey;
use App\Http\Middleware\LogRequestMiddleware;
use App\Http\Middleware\OverrideConfig;
use App\Http\Middleware\ViewShare;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
        using: function () {
            Route::prefix('api')
                ->middleware([OverrideConfig::class, 'api', LogRequestMiddleware::class,  EnsureAppKey::class])->group(base_path('routes/api.php'));

            Route::middleware([OverrideConfig::class, 'web', LogRequestMiddleware::class,  ViewShare::class])->group(base_path('routes/stisla-web.php'));

            Route::middleware([OverrideConfig::class, 'web', LogRequestMiddleware::class, ViewShare::class, 'auth', EducationLevelMiddleware::class, CheckLaravelVersionMiddleware::class])->group(base_path('routes/stisla-web-auth.php'));

            $files = File::files(base_path('routes/modules'));
            foreach ($files as $file) {
                Route::middleware([OverrideConfig::class, 'web', LogRequestMiddleware::class, ViewShare::class, 'auth', EducationLevelMiddleware::class])->group(base_path('routes/modules/' . $file->getBasename()));
            }
        }
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'role' => \Spatie\Permission\Middleware\RoleMiddleware::class,
            'permission' => \Spatie\Permission\Middleware\PermissionMiddleware::class,
            'role_or_permission' => \Spatie\Permission\Middleware\RoleOrPermissionMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // $exceptions->render(function (\Spatie\Permission\Exceptions\UnauthorizedException $e, $request) {
        //     return response()->json([
        //         'responseMessage' => 'You do not have the required authorization.',
        //         'responseStatus'  => 403,
        //     ]);
        // });
    })->create();
