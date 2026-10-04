<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Kasir extends EnsureUserHasRole
{
    public function handle(Request $request, Closure $next, string $ignoredRole = 'kasir'): Response
    {
        return parent::handle($request, $next, 'kasir');
    }
}
