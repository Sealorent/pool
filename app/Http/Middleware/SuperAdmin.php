<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SuperAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user()->id_role == 1) {
            return response()->view('layouts._error', [
                'title' => '403',
                'message' => 'Anda tidak memiliki akses ke halaman ini',
            ], 403);
        }

        return $next($request);
    }
}
