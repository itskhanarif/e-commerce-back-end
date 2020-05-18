<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
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
      //jokhon authenticated hoye jabe tokhon kon page a jabe ta aikhane thakbe
      switch ($guard) {
        case 'admin':
          if (Auth::guard($guard)->check()){
            return redirect()->route('admin.auth.afterauth');
          }
          break;
        case 'web':
          if (Auth::guard($guard)->check()){
            return redirect()->route('index');
          }
          break;
      }
        return $next($request);
    }
}
