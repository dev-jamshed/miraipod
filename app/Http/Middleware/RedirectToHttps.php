<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectToHttps
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Check for specific domain and path
        if ($request->getHost() === 'privatevaults.com' && $request->getPathInfo() === '/about-us') {
            // Redirect to specific HTTPS URL
            return redirect()->secure('/appointment');
        }

        return $next($request);
    }
}
