<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (! auth()->check() || auth()->user()->role !== $role) { //heeft foutmeldingen maar werkt wel?
            return abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
