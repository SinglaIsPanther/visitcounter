<?php

namespace App\Http\Middleware;

use App\Models\Visit;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogVisit
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Avoid logging AJAX or API calls if not needed
        if (!$request->ajax() && !$request->is('api/*')) {
            Visit::create([
                'ip_address' => $request->ip(),
                'user_agent' => substr($request->userAgent(), 0, 255),
                'url' => $request->fullUrl(),
            ]);
        }
        return $next($request);
    }
}
