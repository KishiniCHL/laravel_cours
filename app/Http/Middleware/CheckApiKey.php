<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\ApiKey;

class CheckApiKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $apiKey = $request->header('x-api-key');
        
        if (!$apiKey) {
            return response()->json(['message' => 'API key is missing'], 401);
        }

        $apiKeyRecord = ApiKey::where('key', $apiKey)->first();

        if (!$apiKeyRecord) {
            return response()->json(['message' => 'Invalid API key'], 401);
        }

        $request->setUserResolver(function () use ($apiKeyRecord) {
            return $apiKeyRecord->user;
        });

        return $next($request);
    }
}
