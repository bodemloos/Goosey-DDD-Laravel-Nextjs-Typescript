<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\JsonResponse;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    public function handle($request, Closure $next, ...$guards): JsonResponse
    {
        return $this->auth->user() ? $next($request) : response()->json(['error' => 'Unauthorized'], 401);
    }
}
