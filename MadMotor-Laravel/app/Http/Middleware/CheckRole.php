<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{

    public function handle(Request $request, Closure $next): Response
    {
        if ($this->isAdmin()) {
            return $next($request);
        }

        return redirect('home')->with('error', 'You have not admin access');
    }

    /**
     * Check if the authenticated user is an admin.
     *
     * @return bool
     */
    private function isAdmin(): bool
    {
        return Auth::check() && Auth::user()->role === 'admin';
    }
}

