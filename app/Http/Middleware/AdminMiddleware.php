<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return redirect('/login');
        }

        if (!auth()->user()->is_admin) {
            abort(403, 'شما اجازه دسترسی به پنل مدیریت را ندارید.');
        }

        return $next($request);
    }
}