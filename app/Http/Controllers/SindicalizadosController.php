<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;

class SindicalizadosController extends Controller
{
    public function register(Request $request)
    {
        $userLogged = \Auth::user();

        $picture = $request->file('picture');

        if ($userLogged->acesso == 1) {
            $user = new User();
            $user->name = $request->nome;
            $user->cpf = $request->cpf;
            $user->email = $request->email;
            $user->celular = $request->celular;
            $user->acesso = $request->acesso;
            $user->cargo = $request->cargo;
            $user->id_sindicato = $request->id_sindicato;
            $user->password = bcrypt($request->password);
            $user->picture = $picture->store('img');
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
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Voce nao possui permissao para criar usuarios!'
            ], 401);
        }
    }

    public function index($sindicalizados){
        $result = DB::table('users')
            ->select('id', 'picture', 'name', 'cargo', 'email', 'insta', 'twitter', 'face',)
            ->where('id_sindicato', $sindicalizados)
            ->orderBy('name', 'ASC')
            ->get();
        
        return $result;
    }

    public function del(int $id)
    {
        $member = User::where('id', '=', $id)
            ->get();

        if (count($member) > 0) {
            if ($member->each->delete()) {
                return response()->json([
                    'status' => true,
                    'message' => 'Usuario deletado com sucesso!'
                ]);
            }
        }
        return response()->json([
            'status' => false,
            'message' => 'Usuario informado nao existe!'
        ]);
    }
}