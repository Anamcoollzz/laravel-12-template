<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckLaravelVersionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $checker = app()->make(\App\Services\LaravelVersionCheckerService::class);
        view()->share('isLaravelOutdated', $checker->isOutdated());
        view()->share('laravelCurrentVersion', $checker->getCurrentVersion());
        view()->share('laravelLatestVersion', $checker->getLatestVersion());

        return $next($request);
    }
}
