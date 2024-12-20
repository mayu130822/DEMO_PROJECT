<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LogRequestTime
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
        // Record the start time
        $startTime = microtime(true);

        // Continue with the request
        $response = $next($request);

        // Calculate the time taken
        $endTime = microtime(true);
        $timeTaken = $endTime - $startTime;

        // Log the time taken for the request
        Log::info('Request to ' . $request->fullUrl() . ' took ' . $timeTaken . ' seconds.');

        // Return the response
        return $response;
    }
}
