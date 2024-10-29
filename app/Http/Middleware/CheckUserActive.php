<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserActive
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
        info('Checking if user is active');
        // Check if user is authenticated
        if (Auth::check()) {
            $user = Auth::user();

            // Check if user is active
            if (!$user->is_active) {
                // Logout the user
                Auth::logout();

                // Redirect to login page or any other page with a message
                return redirect()->route('login')->withErrors(['message' => 'Your account is inactive.']);
            }
        }
        if (Auth::check()) {
            $user = Auth::user();

            // Check if user is active
            if (!$user->is_active) {
                // Logout the user
                Auth::logout();

                // Redirect to login page or any other page with a message
                return redirect()->route('login')->withErrors(['message' => 'Your account is inactive.']);
            }
        }

        return $next($request);
    }
}
