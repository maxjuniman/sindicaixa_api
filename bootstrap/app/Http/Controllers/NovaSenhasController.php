<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Models\RecuperarSenhas;
use DB;
use JWTAuth;

class NovaSenhasController extends Controller
{
    public function forgot(Request $request){
        $cpf = $request->input('cpf');

        if (User::where('cpf', '=',$cpf)->exists()) {
            $result = DB::table('users')
            ->select('id', 'email', 'name', 'password')
            ->where('cpf', $cpf)
            ->first();

            $punch_clock = new User();
            $punch_clock->date = now('America/Sao_Paulo');
            $credentials = $result->email;
            $name = $result->name;
            $id_user = $result->id;
            $token = rand(10000, 99999);

            Mail::send('auth.passwords.teste', [ 'credentials' =>  $credentials, 'error' => array(), 'name' => $name, 'token' => $token ], function ($message) use ( $credentials ){
                $message->to($credentials);
                $message->subject('Recuperação de senha SINDIGITAL');
            });

            $user = new RecuperarSenhas();
            $user->id_user = $id_user;
            $user->token = $token;
            $user->utilizado = 0;
            $user->save();

            return response()->json([
                'status' => true,
                'email' => $credentials,
                'message' => 'E-mail enviado com sucesso!'
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Não existe esse cpf cadastrado!'
            ], 401);
        }
    }

    public function reset(Request $request, User $user){
        
        $cpf = $request->cpf;
        $codigo = $request->codigo;
        $password = bcrypt($request->password);

        $result = DB::table('users')
            ->select('id')
            ->where('cpf', $cpf)
            ->first();
        $id_table_user = $result->id;
        
        if (RecuperarSenhas::where('utilizado', 0)->where('token', $codigo)->exists()) {
            $update = RecuperarSenhas::where('token', $codigo)->where('id_user', '=', $id_table_user)->update(['utilizado' => 1]);
            $updatePass = User::where('id', '=', $id_table_user)->update(['password' => $password]);
            
            return response()->json([
                'status' => true,
                'message' => 'Senha alterada com sucesso!'
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Token ja utilizado, refaca o processo de recuperacao de senha!'
            ], 401);
        }
    }
}