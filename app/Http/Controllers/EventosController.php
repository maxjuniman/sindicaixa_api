<?php

namespace App\Http\Controllers;

use App\Models\Eventos;
use Illuminate\Http\Request;

class EventosController extends Controller
{
    public function show($eventos){

        $userLogged = \Auth::user();

        if (Eventos::where('id_sindicato', '=', $userLogged->id_sindicato)->exists()) {
            $eventos = Eventos::where('id_sindicato', $userLogged->id_sindicato)->where('destaque', '=', $eventos)->get();
            return response()->json($eventos);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Não existe eventos criados para este sindicato com destaque!'
            ], 401);
        }
    }
}