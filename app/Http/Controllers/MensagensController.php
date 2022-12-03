<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mensagens;
use Illuminate\Support\Facades\Mail;

class MensagensController extends Controller
{
    public function guarding(Request $request){
        
        $mensagens = Mensagens::create([
            'nome'=>$request->input('nome'),
            'email'=>$request->input('email'),
            'telefone'=>$request->input('telefone'),
            'assunto'=>$request->input('assunto'),
            'mensagem'=>$request->input('mensagem'),
        ]);

        $nome = $request->input('nome');
        $telefone = $request->input('telefone');
        $email = $request->input('email');
        $assunto = $request->input('assunto');
        $mensagem = $request->input('mensagem');
        $credentials = "marcelo.almeida@alternativadigital.com.br";

        Mail::send('auth.passwords.teste', [ 'credentials' =>  $credentials, 'error' => array(), 'name' => $nome, 'telefone' => $telefone, 'email' => $email, 'assunto' => $assunto, 'mensagem' => $mensagem ], function ($message) use ( $credentials ){
            $message->to($credentials);
            $message->subject('Mensagem do site');
        });
        
        return $mensagens;
    }
}