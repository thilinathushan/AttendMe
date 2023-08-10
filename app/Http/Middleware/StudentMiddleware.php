<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class StudentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle($request, Closure $next)
    {
        // Check if the user is authenticated as a student
        if (Auth::guard('student')->check()) {
            return $next($request);
        }

        // If not a student, redirect to an appropriate route or show an error message
        return redirect()->route('login'); // Example: Redirect to the login page
    }
}
