<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Check if authenticated user is admin
        if (!Auth::user()->is_admin) {
            return redirect()->route('home')
                ->with('warning', 'You do not have admin access.');
        }

        return $next($request);
    }
}