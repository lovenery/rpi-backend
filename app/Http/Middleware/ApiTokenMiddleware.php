<?php

namespace App\Http\Middleware;

use Closure;

class ApiTokenMiddleware
{

    protected $except = [
        'api/test'
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // var_dump(config('api.token'));
        $header = $request->header('api_token');
        if (!$header || $header != config('api.token')) {
            //return 'invalid';
            \App::abort(401, 'unauthorication');
        }
        return $next($request);
    }
}
