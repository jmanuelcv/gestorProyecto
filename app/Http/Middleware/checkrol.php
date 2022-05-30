<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkrol
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
   
    public function handle(Request $request, Closure $next, $role)
{
    //comprueba si el usuario tiene permisos para acceder && (auth()->user()->estado)==1
    if ((auth()->user()->rol)=="Admin" || (auth()->user()->rol)==$role  ) {
        return $next($request);
    }else{

abort(403, 'No tienes autorización para ingresar.');
}}
}
