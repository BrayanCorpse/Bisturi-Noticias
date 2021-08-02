<?php

namespace App\Http\Middleware;

use Closure;

class Cors
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
        return $next($request)
        //Url a la que se le dará acceso en las peticiones
       ->header("Access-Control-Allow-Origin", "*")
       //Métodos que a los que se da acceso
       ->header("Access-Control-Allow-Methods", "GET, POST, PUT, PATCH, DELETE, OPTIONS")
       //Headers de la petición
       ->header("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, X-Token-Auth, Authorization"); 
    }
}
