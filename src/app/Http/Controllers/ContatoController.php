<?php

namespace App\Http\Controllers;

use App\Contato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{

    public function index() {
        
        return response()->json([
            "success"   => true,
            "message"   => "Ok!",
            "data"      => Contato::get([
                'id',
                'nome',
                'email',
                'telefone',
            ]),
        ], 200);

    }

    public function delete(Request $request) {
        $contatoId = $request->route('contato');

        try {

            Contato::find($contatoId)->delete();
            
            return response()->json([
                "success"   => true,
                "message"   => "Ok!",
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                "success"   => false,
                "message"   => "Ocorreu um erro!",
                'data'      => $e->getMessage(),
            ], 400);
        }

    }

    public function edit(Request $request) {
        $contatoId = $request->route('contato');

        try {
            $contato = Contato::find($contatoId);

            return response()->json([
                "success"   => true,
                "message"   => "Ok!",
                "data"      => [
                    'contato' => $contato,
                ]
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                "success"   => false,
                "message"   => "Ocorreu um erro!",
                'data'      => $e->getMessage(),
            ], 400);
        }
    }

    public function update(Request $request) {

        $contatoId = $request->route('contato');

        try {
            $contato = Contato::find($contatoId);
            $contato->update($request->all());


            return response()->json([
                "success"   => true,
                "message"   => "Ok!",
                "data"      => [
                    'contato' => $contato,
                ]
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                "success"   => false,
                "message"   => "Ocorreu um erro!",
                'data'      => $e->getMessage(),
            ], 400);
        }
    }

    public function create(Request $request) {

        $this->validate($request, [
            'nome' => 'required',
            'email' => 'nullable|unique:contato',
            'telefone' => 'nullable|unique:contato',
        ], [
            'nome.required'    => 'O campo nome é requerido!',
            'email.unique'    => 'Este e-mail ja está cadastradp na base!',
            'telefone.unique'    => 'Este telefone ja está cadastradp na base!',
        ]);

        try {
            
            Contato::create(
                $request->all()
            );

            return response()->json([
                "success"   => true,
                "message"   => "Ok!"
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
