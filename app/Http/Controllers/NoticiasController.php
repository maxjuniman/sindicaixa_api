<?php

namespace App\Http\Controllers;

use App\Models\Noticias;
use Illuminate\Http\Request;
use DB;

class NoticiasController extends Controller
{
    public function index(){
        return response()->json(Noticias::all());
    }

    public function showDestaque(){
        $result = DB::table('noticias')
            ->select('id', 'picture', 'cartola', 'titulo', 'chamada')
            ->where('modelo', 1)->where('dataInicio', '<=', NOW())->where('dataFinal', '>=', NOW())
            ->first();
        
        return response()->json($result);
    }

    public function noticiaId($noticias){
        $noticias = Noticias::find($noticias);
        if (!is_null($noticias)) {
            return $noticias;
        }
    }

    public function noticiaOffId($noticias){
        $result = DB::table('noticias')
            ->select('id', 'picture', 'color', 'cartola', 'titulo', 'chamada', 'modelo')
            ->where('modelo', '!=', 1)
            ->where('id', '!=', $noticias)
            ->orderBy('dataPublicacao', 'DESC')
            ->limit(4)
            ->get();
        
        return $result;
    }

    public function order(){
        $result = DB::table('noticias')
            ->select('id', 'picture', 'color', 'cartola', 'titulo', 'chamada', 'modelo', 'insta', 'face')
            ->where('modelo', '!=', 1)
            ->where('id', '!=', 17)
            ->where('id', '!=', 20)
            ->orderBy('dataPublicacao', 'DESC')
            ->limit(5)
            ->get();
        
        return $result;
    }

    public function page(){
        $result = DB::table('noticias')
            ->select('id', 'picture', 'color', 'cartola', 'titulo', 'chamada', 'modelo', 'insta', 'face')
            ->where('modelo', '!=', 1)
            ->where('id', '!=', 17)
            ->where('id', '!=', 20)
            // ->where('modelo', '!=', 4)
            ->orderBy('dataPublicacao', 'DESC')
            ->get();
        
        return $result;
    }

    public function busca($noticias){
        $result = DB::table('noticias')
            ->select('id', 'picture', 'cartola', 'titulo', 'chamada', 'modelo')
            ->where('cartola', 'LIKE', '%'.$noticias.'%')
            ->orWhere('titulo', 'LIKE', '%'.$noticias.'%')
            ->orderBy('dataPublicacao', 'ASC')
            ->get();
        
        return $result;
    }

    public function guarding(Request $request){

        $picture = $request->file('picture');
        $audio = $request->file('audio');
        
        if($picture && $audio !== null){
            $noticias = Noticias::create([
                'modelo'=>$request->input('modelo'),
                'dataInicio'=>$request->input('dataInicio'),
                'horaInicio'=>$request->input('horaInicio'),
                'dataFinal'=>$request->input('dataFinal'),
                'horaFinal'=>$request->input('horaFinal'),
                'picture'=>$picture->store('img', 'public'),
                'urlYoutube'=>$request->input('urlYoutube'), 
                'audio'=>$audio->store('audio', 'public'),
                'posicaoVideo'=>$request->input('posicaoVideo'),
                'posicaoAudio'=>$request->input('posicaoAudio'),
                'insta'=>$request->input('insta'),
                'face'=>$request->input('face'),
                'titulo'=>$request->input('titulo'),
                'cartola'=>$request->input('cartola'),
                'chamada'=>$request->input('chamada'),
                'fonte'=>$request->input('fonte'),
                'email'=>$request->input('email'),
                'texto'=>$request->input('texto'),
                'color'=>$request->input('color'),
                'colorDuplo'=>$request->input('colorDuplo'),
                'posicaoImg'=>$request->input('posicaoImg'),
                'dataPublicacao'=>$request->input('dataPublicacao'),
            ]);
        } else if ($picture == null && $audio !== null) {
            $noticias = Noticias::create([
                'modelo'=>$request->input('modelo'),
                'dataInicio'=>$request->input('dataInicio'),
                'horaInicio'=>$request->input('horaInicio'),
                'dataFinal'=>$request->input('dataFinal'),
                'horaFinal'=>$request->input('horaFinal'),
                'urlYoutube'=>$request->input('urlYoutube'), 
                'audio'=>$audio->store('audio', 'public'),
                'posicaoVideo'=>$request->input('posicaoVideo'),
                'posicaoAudio'=>$request->input('posicaoAudio'),
                'insta'=>$request->input('insta'),
                'face'=>$request->input('face'),
                'titulo'=>$request->input('titulo'),
                'cartola'=>$request->input('cartola'),
                'chamada'=>$request->input('chamada'),
                'fonte'=>$request->input('fonte'),
                'email'=>$request->input('email'),
                'texto'=>$request->input('texto'),
                'color'=>$request->input('color'),
                'colorDuplo'=>$request->input('colorDuplo'),
                'posicaoImg'=>$request->input('posicaoImg'),
                'dataPublicacao'=>$request->input('dataPublicacao'),
            ]);
        } else if ($picture !== null && $audio == null) {
            $noticias = Noticias::create([
                'modelo'=>$request->input('modelo'),
                'dataInicio'=>$request->input('dataInicio'),
                'horaInicio'=>$request->input('horaInicio'),
                'dataFinal'=>$request->input('dataFinal'),
                'horaFinal'=>$request->input('horaFinal'),
                'picture'=>$picture->store('img', 'public'),
                'urlYoutube'=>$request->input('urlYoutube'), 
                'posicaoVideo'=>$request->input('posicaoVideo'),
                'posicaoAudio'=>$request->input('posicaoAudio'),
                'insta'=>$request->input('insta'),
                'face'=>$request->input('face'),
                'titulo'=>$request->input('titulo'),
                'cartola'=>$request->input('cartola'),
                'chamada'=>$request->input('chamada'),
                'fonte'=>$request->input('fonte'),
                'email'=>$request->input('email'),
                'texto'=>$request->input('texto'),
                'color'=>$request->input('color'),
                'colorDuplo'=>$request->input('colorDuplo'),
                'posicaoImg'=>$request->input('posicaoImg'),
                'dataPublicacao'=>$request->input('dataPublicacao'),
            ]);
        } else {
            $noticias = Noticias::create([
                'modelo'=>$request->input('modelo'),
                'dataInicio'=>$request->input('dataInicio'),
                'horaInicio'=>$request->input('horaInicio'),
                'dataFinal'=>$request->input('dataFinal'),
                'horaFinal'=>$request->input('horaFinal'),
                'urlYoutube'=>$request->input('urlYoutube'), 
                'posicaoVideo'=>$request->input('posicaoVideo'),
                'posicaoAudio'=>$request->input('posicaoAudio'),
                'insta'=>$request->input('insta'),
                'face'=>$request->input('face'),
                'titulo'=>$request->input('titulo'),
                'cartola'=>$request->input('cartola'),
                'chamada'=>$request->input('chamada'),
                'fonte'=>$request->input('fonte'),
                'email'=>$request->input('email'),
                'texto'=>$request->input('texto'),
                'color'=>$request->input('color'),
                'colorDuplo'=>$request->input('colorDuplo'),
                'posicaoImg'=>$request->input('posicaoImg'),
                'dataPublicacao'=>$request->input('dataPublicacao'),
            ]);
        }

        return $noticias;
    }

    public function del($noticias)
    {
        $member = Noticias::where('id', '=', $noticias)
            ->get();

        if (count($member) > 0) {
            if ($member->each->delete()) {
                return response()->json([
                    'status' => true,
                    'message' => 'Noticia excluida com sucesso!'
                ]);
            }
        }
        return response()->json([
            'status' => false,
            'message' => 'Noticia informado nao existe!'
        ]);
    }

    public function update(Request $request, Noticias $noticias){

        $picture = $request->file('picture');
        if ($picture !== null) {
            $picture = $picture->store('public/img');
            $noticias->picture = $picture;
        }
        
        $audio = $request->file('audio');
        if ($audio !== null) {
            $audio = $audio->store('public/img');
            $noticias->audio = $audio;
        }
        
        $noticias->modelo = $request->input('modelo');
        $noticias->dataInicio = $request->input('dataInicio');
        $noticias->horaInicio = $request->input('horaInicio');
        $noticias->dataFinal = $request->input('dataFinal');
        $noticias->horaFinal = $request->input('horaFinal');
        $noticias->urlYoutube = $request->input('urlYoutube');
        $noticias->posicaoVideo = $request->input('posicaoVideo');
        $noticias->posicaoAudio = $request->input('posicaoAudio');
        $noticias->insta = $request->input('insta');
        $noticias->face = $request->input('face');
        $noticias->titulo = $request->input('titulo');
        $noticias->cartola = $request->input('cartola');
        $noticias->chamada = $request->input('chamada');
        $noticias->fonte = $request->input('fonte');
        $noticias->email = $request->input('email');
        $noticias->texto = $request->input('texto');
        $noticias->color = $request->input('color');
        $noticias->colorDuplo = $request->input('colorDuplo');
        $noticias->posicaoImg = $request->input('posicaoImg');
        $noticias->dataPublicacao = $request->input('dataPublicacao');
        
        $noticias->save();

        return $noticias;
    }
}