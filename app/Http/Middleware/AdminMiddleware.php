<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
        if(Auth::check())
        {
            if(Auth::user()->role_as == 'ADM')
            {
                return $next($request);
            }
            else
            {
                return redirect('/home')->with('status','Acesso Negado! Você não é um Administrador');
            }
        }
        else
        {
            return redirect('/home')->with('status','Por Favor, Faça Login Primeiro');
        }
    }
}
