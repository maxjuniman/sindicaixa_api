<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use JWTAuth;
use App\Http\Requests\UpdateUserRequest;
use DB;

class AuthController extends Controller
{
    public $loginAfterSignUp = false;
    
    public function index(){
        return User::all();
    }

    public function showUser(){
        $userLogged = \Auth::user();
        return response()->json($userLogged);
    }

    public function userId($user){
        $userLogged = \Auth::user();

        if ($userLogged->acesso == 1) {
            $user = User::find($user);
                if (!is_null($user)) {
                    return $user;
                } else {
                    return response()->json([
                        'status' => false,
                        'message' => 'Usuarios não existe!'
                    ], 401); 
                }
        } else{
            return response()->json([
                'status' => false,
                'message' => 'Voce nao possui permissao para listar usuarios!'
            ], 401); 
        }
    }
    
    public function login(Request $request)
    {
       
        $credentials = $request->only("login", "password");
        $token = null;

        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json([
                "status" => false,
                "message" => "Unauthorized"
            ], 401);
        }

        return response()->json([
            "status" => true,
            "token" => $token
        ]);
    }

    public function register(Request $request)
    {
        $userLogged = \Auth::user();

        if ($userLogged->acesso == 1) {
            $user = new User();
            $user->nome = $request->nome;
            $user->login = $request->login;
            $user->cargo = $request->cargo;
            $user->cpf = $request->cpf;
            $user->email = $request->email;
            $user->celular = $request->celular;
            $user->acesso = $request->acesso;
            $user->password = bcrypt($request->password);
            $user->save();

            if ($this->loginAfterSignUp) {
                return $this->login($request);
            }

            return response()->json($user);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Voce nao possui permissao para criar usuarios!'
            ], 401);
        }
    }

    public function update(Request $request, int $sindicalizados)
    {
        $user = User::find($sindicalizados);

        if (is_null($user)) {
            return response()->json([
                'status' => false,
                'message' => 'O ID do usuário informádo é inválido!'
            ], 404);
        }

        $resultcpf = DB::table('users')
            ->where('cpf', $request->cpf)
            ->where('id', '!=', $sindicalizados)
            ->first();

            if (!is_null($resultcpf)) {
                return response()->json([
                    'status' => false,
                    'message' => 'CPF ja existente no cadastro!'
                ], 404);
            }
        $resultemail = DB::table('users')
            ->where('email', $request->email)
            ->where('id', '!=', $sindicalizados)
            ->first();

            if (!is_null($resultemail)) {
                return response()->json([
                    'status' => false,
                    'message' => 'Email ja existente no cadastro!'
                ], 404);
            }    
        $resultcelular = DB::table('users')
            ->where('celular', $request->celular)
            ->where('id', '!=', $sindicalizados)
            ->first();

            if (!is_null($resultcelular)) {
                return response()->json([
                    'status' => false,
                    'message' => 'Celular ja existente no cadastro!'
                ], 404);
            }

        $result = DB::table('users')
            ->select('cpf', 'email', 'celular')
            ->where('id', $sindicalizados)
            ->first();
        $cpf = $result->cpf;
        $email = $result->email;
        $celular = $result->celular;

        if($cpf !== $request->cpf) {
            $user->cpf = $request->cpf;
        }
        if($email !== $request->email) {
            $user->email = $request->email;
        }
        if($celular !== $request->celular) {
            $user->celular = $request->celular;
        }

        if(!is_null($request->password)) {
            $user->password = bcrypt($request->password);
        }

        $user->name = $request->nome;
        $user->acesso = $request->acesso;
        $user->cargo = $request->cargo;
        $user->id_sindicato = $request->id_sindicato;
        $user->rg = $request->rg;
        $user->dataNascimento = $request->dataNascimento;
        $user->sexo = $request->sexo;
        $user->social = $request->social;
        $user->nomeSocial = $request->nomeSocial;
        $user->sexual = $request->sexual;
        $user->orientacaoSexual = $request->orientacaoSexual;
        $user->genero = $request->genero;
        $user->identidadeGenero = $request->identidadeGenero;
        $user->estadoCivil = $request->estadoCivil;
        $user->telefone = $request->telefone;
        $user->insta = $request->insta;
        $user->twitter = $request->twitter;
        $user->face = $request->face;
        $user->instituicaoFinanceira = $request->instituicaoFinanceira;
        $user->codigoInstituicao = $request->codigoInstituicao;
        $user->agencia = $request->agencia;
        $user->dataAdmissao = $request->dataAdmissao;
        $user->matricula = $request->matricula;
        $user->emailComercial = $request->emailComercial;
        $user->cidade = $request->cidade;
        $user->estado = $request->estado;
        $user->diretoria = $request->diretoria;
        $user->delegado = $request->delegado;
        $user->cargoSindicato = $request->cargoSindicato;

        $user->save();

        return response()->json($user);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}