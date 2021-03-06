<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HttpsProtocol
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $request->setTrustedProxies([$request->getClientIp()]);
        if(!$request->isSecure() && !(env('APP_ENV') === 'local')) {
            return redirect()->secure($request->getRequestUri());
        }

        return $next($request);
    }
}
