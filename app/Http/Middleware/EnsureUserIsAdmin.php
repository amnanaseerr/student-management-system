<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsAdmin
{
    /**
     * Day 13: Middleware, Authorization, Roles & Permissions.
     * Blocks access to a route unless the logged-in user's role is 'admin'.
     * (This runs AFTER the 'auth' middleware, so $request->user() always exists here.)
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! $request->user() || ! $request->user()->isAdmin()) {
            abort(403, 'You do not have permission to access this page.');
        }

        return $next($request);
    }
}
