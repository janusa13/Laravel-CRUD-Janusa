<?php

namespace App\Http\Middleware;

use App\Models\Registro;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Carbon\Carbon;
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
        $hora=Carbon::now()->format('H:i:s');
        $fecha = Carbon::now()->format('Y-m-d');
        $metodo=$request->method();
        $navegador =$request->header('User-Agent');
        if ($metodo!=='GET'){
            if($metodo=='POST'){
                $metodo='alta';
            }else if($metodo=='PUT' || $metodo=='PATCH'){
                $metodo='modificacion';
            }else if($metodo==`DELETE`){
                $metodo='baja';
            }
           
            $user = auth()->user()->name;
            $ip = $request->ip();
            Registro::create([
                'hora'=>$hora,
                'user'=>$user,
                'accion'=>$metodo,
                'ip'=>$ip,
                'navegador'=>$navegador,
                'fecha'=>$fecha
            ]);
            return $response;
        }
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