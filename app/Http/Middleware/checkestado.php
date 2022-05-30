<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkestado
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
      
        if ((auth()->user()->estado)== 1  ) {
            return $next($request);
       }else if( (auth()->user()->estado)== 0){
        auth()->logout();
        
        return response()->view('errors.401');
   }}
    }

