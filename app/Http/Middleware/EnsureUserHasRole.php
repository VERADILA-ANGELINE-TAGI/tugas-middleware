<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserHasRole
{
    public function handle(Request $request, Closure $next, string $role): Response
    {
        $user = $request->user();

        if (!$user) {
            return redirect()->route('login');
        }

        $allowedRoles = explode('|', $role);

        abort_unless(in_array($user->role, $allowedRoles, true), 403, 'Akses ditolak.');

        return $next($request);
    }
}
