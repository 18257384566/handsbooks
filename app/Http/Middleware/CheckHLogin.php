<?php

namespace App\Http\Middleware;

use Closure;

class CheckHLogin
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
        if(!session('email')){
            return redirect('home/login');
        }

        return $next($request);
    }
}
