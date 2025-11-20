<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EducationLevelMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (is_app_dataku() && !session()->has('education_level')) {
            if (is_kepala_sekolah() || is_guru()) {
                session()->put('education_level', auth_user()->educationlevel->education_level);
                session()->put('education_level_id', auth_user()->education_level_id);
                return $next($request);
            }
            return redirect()->route('select-education-level.index');
        }
        return $next($request);
    }
}
