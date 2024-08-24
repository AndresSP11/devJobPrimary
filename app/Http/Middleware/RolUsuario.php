<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RolUsuario
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if($request->user()->rol===1){
            /* Rol 2 significa rol reclutador, rol 1 te redireccion al home , osea / */
            // En este caso que no sea el rol 2, reireccionar al usuario del Home                               
            return redirect()->route('home');
        }


        return $next($request);
    }
}
