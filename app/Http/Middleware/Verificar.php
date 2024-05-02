<?php

namespace App\Http\Middleware;

use App\Models\Registro;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Verificar
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);
        $hora=now();
        $ip = $request->ip();
        Registro::create([
            'hora'=>$hora,
            'ip'=>$ip
        ]);
        return $response;
    }
}


/*
    * Instalar libreria que se llama Breeze.
    * te genera codigo en tres lugares: rutas, vistas y controladores
    * de un logIng ya andando.
    * elegir la opcion con Bladde.
    * una vez que tenes el login, terminar con la aplicacion.  
*/