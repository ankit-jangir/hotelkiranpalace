<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckDeveloperAccess
{
    /**
     * Developer / Company only. Access via ?key=YOUR_SECRET or X-Developer-Key header.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $secret = config('app.developer_secret_key') ?: env('DEVELOPER_SECRET_KEY');
        if (empty($secret)) {
            abort(404);
        }

        $key = $request->input('key') ?? $request->header('X-Developer-Key');
        if ($key !== $secret) {
            abort(404);
        }

        return $next($request);
    }
}
