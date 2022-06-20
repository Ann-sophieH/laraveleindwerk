<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()){ //bestaande user?
            if(Auth::user()->isAdmin()){ //is user admin?
                return $next($request); //ok in
            }
            Session::flash('message', 'You do not have access to go there!');//put message in cart!!
            return redirect('/cart'); //go back to your cart as user

        }
        return redirect('/'); //get out as guest

    }
}
