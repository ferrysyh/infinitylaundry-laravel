<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request
     * @param \Closure 
     * @param mixed
     */
    public function handle($request, Closure $next, ...$role)
    {
        if (in_array($request->user()->role, $role)){
            return $next($request);
        }
        return redirect('/');
    }
}
