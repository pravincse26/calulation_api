<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TokenVerfication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $token = $request->header('Authorization');

        if ($token != 'Bearer xmefPF49mAlqopoYsorY1yypnH4RFmob1JQEjZ4k') {
            return response()->json(['error' => 'Invalid API token'], 401);
        }

        return $next($request);
    }
}
