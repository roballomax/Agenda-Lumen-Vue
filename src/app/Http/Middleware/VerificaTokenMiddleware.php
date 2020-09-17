<?php

namespace App\Http\Middleware;

use App\Usuario;
use Closure;

class VerificaTokenMiddleware
{
    public function handle($request, Closure $next)
    {
        $token = str_replace('Bearer ', '', $request->header()['authorization']);
        $tokenValido = Usuario::where('token', $token)->exists();

        if(!$tokenValido)
            return response()->json([
                "success"   => false,
                "message"   => "Ocorreu um erro!",
            ], 400);

        return $next($request);
    }
}
