<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class UsuarioController extends Controller
{
    public function login(Request $request) {

        $this->validate($request, [
            'login' => 'required|exists:usuario',
            'senha' => 'required',
        ], [
            'login.required'    => 'O campo login é requerido!',
            'login.exists'      => 'Login inexistente!',
            
            'senha.required'    => 'O campo senha é requerido!',
        ]);

        try {
            $usuario = Usuario::where('login', $request->login)
            ->first();

            $senhaDecryptada = Crypt::decrypt($usuario->senha);

            if($request->senha != $senhaDecryptada)
                throw new \Exception('Login ou senha incorretos!');
            
            return response()->json([
                "success"   => true,
                "message"   => "Ok!",
                'data'      => [
                    'token' => $usuario->token
                ],
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                "success"   => false,
                "message"   => "Ocorreu um erro!",
                'data'      => $e->getMessage(),
            ], 400);
        }
        

    }
}
