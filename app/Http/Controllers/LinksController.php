<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Links;

class LinksController extends Controller
{
    public function index(){
        return response()->json(Links::all());
    }

    public function show($links){
        $links = Links::find($links);
        if (!is_null($links)) {
            return $links;
        }
    }

    public function del($links)
    {
        $member = Links::where('id', '=', $links)
            ->get();

        if (count($member) > 0) {
            if ($member->each->delete()) {
                return response()->json([
                    'status' => true,
                    'message' => 'Link excluido com sucesso!'
                ]);
            }
        }
        return response()->json([
            'status' => false,
            'message' => 'Link informado nao existe!'
        ]);
    }

    public function guarding(Request $request){

        $imagem = $request->file('imagem');
        
        $links = Links::create([
            'nome'=>$request->input('nome'),
            'texto'=>$request->input('texto'),
            'imagem'=>$imagem->store('links', 'public'),
            'site'=>$request->input('site'),
            'insta'=>$request->input('insta'),
            'face'=>$request->input('face'),
            'twitter'=>$request->input('twitter'),
            'youtube'=>$request->input('youtube'),
            'whats'=>$request->input('whats'),
            'email'=>$request->input('email'),
        ]);
         

        return $links;
    }

    public function update(Request $request, Links $links){

        $imagem = $request->file('imagem');
        if ($imagem !== null) {
            $imagem = $imagem->store('public/img');
            $links->imagem = $imagem;
        }
        
        $links->nome = $request->input('nome');
        $links->texto = $request->input('texto');
        $links->site = $request->input('site');
        $links->insta = $request->input('insta');
        $links->face = $request->input('face');
        $links->twitter = $request->input('twitter');
        $links->youtube = $request->input('youtube');
        $links->whats = $request->input('whats');
        $links->youtube = $request->input('email');
     
        
        $links->save();

        return $links;
    }
}