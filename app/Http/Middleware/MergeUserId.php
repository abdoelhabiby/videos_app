<?php

namespace App\Http\Middleware;

use Closure;

class MergeUserId
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if(auth()->guard($guard)->check()){
           $request->merge(['user_id' => auth()->user()->id]);
        }
        return $next($request);
    }
}
