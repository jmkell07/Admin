<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Session;

class Admin
{
    public function handle($request, Closure $next)
    {
        if(Auth::check() && Auth::user()->isAdmin() ){
            return $next($request);
        }
         Session::flash('alert-warning', ' Not Authorized');
        return redirect('/');
    }
}
