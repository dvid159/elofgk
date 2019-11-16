<?php

namespace App\Http\Middleware;

use Closure;

class IsDocente
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
        if(auth()->user()->is_docente == 1 && auth()->user()->is_admin == 0){
            return $next($request);
        }else  if(auth()->user()->is_docente == 0 && auth()->user()->is_admin == 1){
            return redirect('/admin/home');
        }

        return redirect('home')->with('error', "No tienes permiso de Docente");
    }
}
