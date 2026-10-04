<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Admin extends EnsureUserHasRole
{
    public function handle(Request $request, Closure $next, string $ignoredRole = 'admin'): Response
    {
        return parent::handle($request, $next, 'admin');
    }
}