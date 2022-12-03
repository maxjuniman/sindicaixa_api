<?php

namespace App\Http\Controllers;

use App\Models\Permissoes;
use Illuminate\Http\Request;

class PermissoesController extends Controller
{
    public function permissao($permissoes){
        $userLogged = \Auth::user();

        if ($userLogged->acesso !== null) {
            $permissoes = Permissoes::where('acesso', $userLogged->acesso)->where('grupo', $permissoes)->get();
            return $permissoes;
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Voce nao possui permissao selecionadas!'
            ], 401);
        }
    }

    public function guarding(Request $request){
       
        $permissoes = Permissoes::create([
            'acesso'=>$request->input('acesso'),
            'grupo'=>$request->input('grupo'),
            'permissao'=>$request->input('permissao'),
        ]);

        return $permissoes;
    }
}