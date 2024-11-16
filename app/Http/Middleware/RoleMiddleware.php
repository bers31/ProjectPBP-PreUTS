<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        // Check if the authenticated user's role matches the required role
        if (Auth::check() && Auth::user()->role === $role) {
            return $next($request);
        }
        if(Auth::user()->role === 'dosen' && Auth::user()->dosen->dekan){
            return $next($request);
        }
        else if(Auth::user()->role === 'dosen' && Auth::user()->dosen->kaprodi){
            return $next($request);
        }

        // If user doesn't have the correct role, redirect them to a default page with an error
        return response()->view('errors.unauthorized', ['previousUrl' => url()->previous()], 403);
    }
}


