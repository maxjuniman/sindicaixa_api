<?php

namespace App\Http\Controllers;

use App\Models\Juridicos;
use Illuminate\Http\Request;

class JuridicosController extends Controller
{
    public function index(){
        return response()->json(Juridico::all());
    }

    public function guarding(Request $request){
       
        $juridico = Juridico::create([
            'nome'=>$request->input('nome'),
            'numero'=>$request->input('numero'),
            'tipo'=>$request->input('tipo'),
        ]);

        return $juridico;
    }
}