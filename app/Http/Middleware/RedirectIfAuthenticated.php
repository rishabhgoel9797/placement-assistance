<?php

namespace App\Http\Middleware;

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
        switch($guard)
        {
            case 'teacher':
            if(Auth::guard($guard)->check())
            {
                return redirect()->route('teacher.dashboard');
            }
            break;

            case 'student':
            if(Auth::guard($guard)->check())
            {
                return redirect()->route('student.dashboard');
            }
            break;
            
            default:
            if(Auth::guard($guard)->check())
            {
                return redirect('/home');
            }
            break;
        }

        // if($guard=="teacher")
        // {
        //     if(Auth::guard($guard)->check())
        //     {
        //         return redirect('teacher.dashboard');
        //     }
        // }
        // else
        // {
        //     if(Auth::guard($guard)->check())
        //     {
        //         return redirect('/home');
        //     }
        // }

        return $next($request);
    }
}
