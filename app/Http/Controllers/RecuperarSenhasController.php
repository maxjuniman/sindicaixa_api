<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RecuperarSenhas;
use DB;

class RecuperarSenhasController extends Controller
{
    public function validation(Request $request){
       $codigo = $request->codigo;
       $cpf = $request->cpf;
       
        $result = DB::table('users')
            ->select('id')
            ->where('cpf', $cpf)
            ->first();
        $id_table_user = $result->id;

        $result2 = DB::table('recuperar_senhas')
            ->select('token')
            ->where('id_user', $id_table_user)
            ->where('utilizado', 0)
            ->whereRaw('NOW() < ADDTIME(created_at, "0:30:0.000000")')
            ->orderBy('id', 'DESC')
            ->first();
        $token = $result2->token;

        if($token == $codigo){
            return response()->json([
                'status' => true,
                'message' => 'Codigo valido'
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Codigo invalido'
            ], 401);
        }
    }
}