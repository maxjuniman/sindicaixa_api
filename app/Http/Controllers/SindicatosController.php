<?php

namespace App\Http\Controllers;

use App\Models\Sindicatos;
use Illuminate\Http\Request;
use DB;

class SindicatosController extends Controller
{
    public function index(){
        return response()->json(Sindicatos::all());
    }

    public function show($sindicatos){
        $sindicatos = Sindicatos::find($sindicatos);
        if (!is_null($sindicatos)) {
            return $sindicatos;
        }
    }

    public function diretoria($sindicatos){
        $result = DB::table('users')
            ->select('id', 'picture', 'name', 'cargo')
            ->where('id_sindicato', $sindicatos)
            ->where('diretoria', 'diretoriaSim')
            ->orderBy('name', 'ASC')
            ->get();
        
        return $result;
    }

    public function delegado($sindicatos){
        $result = DB::table('users')
            ->select('id', 'picture', 'name', 'cargo')
            ->where('id_sindicato', $sindicatos)
            ->where('delegado', 'delegadoSim')
            ->orderBy('name', 'ASC')
            ->get();
        
        return $result;
    }

    public function guarding(Request $request){
       
        $sindicatos = Sindicatos::create([
            'nome'=>$request->input('nome'),
            'cnpj'=>$request->input('cnpj'),
            'telefone'=>$request->input('telefone'),
            'celular'=>$request->input('celular'),
            'email'=>$request->input('email'),
            'site'=>$request->input('site'),
            'imagem'=>$request->input('imagem'),
            'insta'=>$request->input('insta'),
            'twitter'=>$request->input('twitter'),
            'face'=>$request->input('face'),
            'endereco'=>$request->input('endereco'),
            'numero'=>$request->input('numero'),
            'bairro'=>$request->input('bairro'),
            'cidade'=>$request->input('cidade'),
            'estado'=>$request->input('estado'),
            'cep'=>$request->input('cep'),
            'dataFundacao'=>$request->input('dataFundacao'),
            'emailComercial'=>$request->input('emailComercial'),
        ]);

        return $sindicatos;
    }
}