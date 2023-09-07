<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MDusuariocliente
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $usuarioactual = Session::get('usuarioactual');
        if(isset($usuarioactual)){
            if ($usuarioactual->tipo_usuario!='cliente') {
                return redirect('main');
            }
        }else
        return redirect('main');
        return $next($request);
    }
}
