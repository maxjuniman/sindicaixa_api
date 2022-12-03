<?php

namespace App\Http\Controllers;

use App\Models\SindicatosDetalhes;
use Illuminate\Http\Request;

class SindicatosDetalhesController extends Controller
{
    public function show($sindicatosDetalhe){
        if (SindicatosDetalhes::where('id_sindicato', '=', $sindicatosDetalhe)->exists()) {
            $sindicatosDetalhe = SindicatosDetalhes::where('id_sindicato', $sindicatosDetalhe)->get();
            return response()->json($sindicatosDetalhe);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Não existe sindicato com este id!'
            ], 401);
        }
    }
}