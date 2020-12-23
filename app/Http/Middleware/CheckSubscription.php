<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;

class CheckSubscription
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
        
        if(Auth::user()->subscribed('main')):
         return  redirect('profile');
        endif;
        return $next($request);
    }
}
