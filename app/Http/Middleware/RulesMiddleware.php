<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RulesMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        switch (Auth::user()->rules){
            case 0:
                if($request->route()->getPrefix() != $request->route()->getPrefix()){
                    return redirect()->route('global_dashboard');
                }
                break;
            case 1:
                dd(Auth::user());
                break;
        }

        return $next($request);
    }
}
