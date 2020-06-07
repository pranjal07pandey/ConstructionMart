<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ProductManager
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
        if (Auth::user()->usertype=='productManager'){
            return $next($request);
        }
        elseif (Auth::user()->usertype=='admin'){
            return $next($request);
        }

        else {
            return redirect('/home')->with('status', 'Not authorized');
            # code...
        }
    }
}
