<?php

namespace App\Http\Middleware;

use Closure;

class IsAdmin
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
        if(auth()->user()->is_admin == 1 && auth()->user()->is_docente == 0 || auth()->user()->is_admin == 1 && auth()->user()->is_docente == 1 ){
            return $next($request);
        }else  if(auth()->user()->is_admin == 0 && auth()->user()->is_docente == 1){
            return redirect('/docente/home');
        }

        // return redirect('home')->with('error', "No tienes permiso de Admin");
        return back()->with('error', "No tienes permiso de Admin");
    }
}
