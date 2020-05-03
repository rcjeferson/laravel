<?php

namespace App\Http\Middleware;

use Closure;

class CheckIsAdminMiddleware
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
        $user = auth()->user();
        
        if (!in_array($user, ['admin@admin.com']))
        {
            return response('Unauthorized', 401);
        }
        
        return $next($request);
    }
}
