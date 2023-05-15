<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check() && Auth::user()->role->id == 3)
        {
            if(Auth::check() && Auth::user()->status)
            {
                $deactive = Auth::user()->status == '1';
                Auth::logout();

                if($deactive == 1)
                {
                    $msg = "Your Account is Deactive. Please Contact Administrator.";
                }
                return redirect()->route('login')
                    ->with('error', $msg)
                    ->withErrors(['email' => 'Your Account is Deactive. Please Contact Administrator.']);
            }
            return $next($request);
        }
        else if(Auth::check() && Auth::user()->role->id == 2)
        {
            return redirect()->route('author.dashboard');
        }
        else
        {
            return redirect()->route('admin.dashboard');
        }
    }
}
