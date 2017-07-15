<?php

namespace App\Http\Middleware;

use Closure;

class Auth
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
        \Auth::loginUsingId(1);
        if ($request->user() && ($request->user()->hasRole(['admin','root']) || $request->user()->can(\Route::current()->getActionName()))) {
            return $next($request);
        }

        return redirect('/');
    }
}
