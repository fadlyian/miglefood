<?php

namespace App\Http\Middleware;

use App\Models\Consumer;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthenticateConsumer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!session()->has('consumer')) {
            return redirect()->route('login-customer');
        }

        // Retrieve the consumer ID based on the telephone number
        // $telephone = session('consumer');
        // $consumer = Consumer::where('phoneNumber', $telephone)->first();

        // Store the consumer ID in the session
        // session(['consumer_id' => $consumer->id]);

        return $next($request);
    }
}
