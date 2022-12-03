<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diretorias;
use DB;

class DiretoriasController extends Controller
{
    public function index(){
        return response()->json(Diretorias::all());
    }

    public function tipo($diretorias){
        $result = DB::table('diretorias')
            ->select('id', 'imagem', 'nome', 'cargo')
            ->where('tipo', $diretorias)
            ->get();
        
        return response()->json($result);
    }
}