<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Multimidias;
use DB;

class MultimidiasController extends Controller
{
    public function index(){
        return response()->json(Multimidias::all());
    }

    public function show($multimidias){
        $multimidias = Multimidias::find($multimidias);
        if (!is_null($multimidias)) {
            return $multimidias;
        }
    }

    public function home(){
        $result = DB::table('multimidias')
            ->select('id', 'modelo', 'urlYoutube', 'titulo', 'cartola', 'texto', 'imagem0', 'imagem1', 'imagem2', 'imagem3')
            ->orderBy('id', 'DESC')
            ->limit(4)
            ->get();
        
        return response()->json($result);
    }
    
    public function guarding(Request $request){

        //store file into document folder
        if ($request->imagem0 == null) { $imagem0 = null; }else{ $imagem0 = $request->imagem0->store('midia'); }
        if ($request->imagem1 == null) { $imagem1 = null; }else{ $imagem1 = $request->imagem1->store('midia'); }
        if ($request->imagem2 == null) { $imagem2 = null; }else{ $imagem2 = $request->imagem2->store('midia'); }
        if ($request->imagem3 == null) { $imagem3 = null; }else{ $imagem3 = $request->imagem3->store('midia'); }
        if ($request->imagem4 == null) { $imagem4 = null; }else{ $imagem4 = $request->imagem4->store('midia'); }
        if ($request->imagem5 == null) { $imagem5 = null; }else{ $imagem5 = $request->imagem5->store('midia'); }
        if ($request->imagem6 == null) { $imagem6 = null; }else{ $imagem6 = $request->imagem6->store('midia'); }
        if ($request->imagem7 == null) { $imagem7 = null; }else{ $imagem7 = $request->imagem7->store('midia'); }
        if ($request->imagem8 == null) { $imagem8 = null; }else{ $imagem8 = $request->imagem8->store('midia'); }
        if ($request->imagem9 == null) { $imagem9 = null; }else{ $imagem9 = $request->imagem9->store('midia'); }
        if ($request->imagem10 == null) { $imagem10 = null; }else{ $imagem10 = $request->imagem10->store('midia'); }
        if ($request->imagem11 == null) { $imagem11 = null; }else{ $imagem11 = $request->imagem11->store('midia'); }
        if ($request->imagem12 == null) { $imagem12 = null; }else{ $imagem12 = $request->imagem12->store('midia'); }
        if ($request->imagem13 == null) { $imagem13 = null; }else{ $imagem13 = $request->imagem13->store('midia'); }
        if ($request->imagem14 == null) { $imagem14 = null; }else{ $imagem14 = $request->imagem14->store('midia'); }
        if ($request->imagem15 == null) { $imagem15 = null; }else{ $imagem15 = $request->imagem15->store('midia'); }
        if ($request->imagem16 == null) { $imagem16 = null; }else{ $imagem16 = $request->imagem16->store('midia'); }
        if ($request->imagem17 == null) { $imagem17 = null; }else{ $imagem17 = $request->imagem17->store('midia'); }
        if ($request->imagem18 == null) { $imagem18 = null; }else{ $imagem18 = $request->imagem18->store('midia'); }
        if ($request->imagem19 == null) { $imagem19 = null; }else{ $imagem19 = $request->imagem19->store('midia'); }

        //store your file into database
        $document = new Multimidias();
        $document->modelo = $request->modelo;
        $document->urlYoutube = $request->urlYoutube;
        $document->titulo = $request->titulo;
        $document->cartola = $request->cartola;
        $document->texto = $request->texto;
        $document->legenda0 = $request->legenda0;
        $document->legenda1 = $request->legenda1;
        $document->legenda2 = $request->legenda2;
        $document->legenda3 = $request->legenda3;
        $document->legenda4 = $request->legenda4;
        $document->legenda5 = $request->legenda5;
        $document->legenda6 = $request->legenda6;
        $document->legenda7 = $request->legenda7;
        $document->legenda8 = $request->legenda8;
        $document->legenda9 = $request->legenda9;
        $document->legenda10 = $request->legenda10;
        $document->legenda11 = $request->legenda11;
        $document->legenda12 = $request->legenda12;
        $document->legenda13 = $request->legenda13;
        $document->legenda14 = $request->legenda14;
        $document->legenda15 = $request->legenda15;
        $document->legenda16 = $request->legenda16;
        $document->legenda17 = $request->legenda17;
        $document->legenda18 = $request->legenda18;
        $document->legenda19 = $request->legenda19;

        $document->imagem0 = $imagem0;
        $document->imagem1 = $imagem1;
        $document->imagem2 = $imagem2;
        $document->imagem3 = $imagem3;
        $document->imagem4 = $imagem4;
        $document->imagem5 = $imagem5;
        $document->imagem6 = $imagem6;
        $document->imagem7 = $imagem7;
        $document->imagem8 = $imagem8;
        $document->imagem9 = $imagem9;
        $document->imagem10 = $imagem10;
        $document->imagem11 = $imagem11;
        $document->imagem12 = $imagem12;
        $document->imagem13 = $imagem13;
        $document->imagem14 = $imagem14;
        $document->imagem15 = $imagem15;
        $document->imagem16 = $imagem16;
        $document->imagem17 = $imagem17;
        $document->imagem18 = $imagem18;
        $document->imagem19 = $imagem19;

       
        $document->save();
        return $document;
    }

    public function del($multimidias)
    {
        $member = Multimidias::where('id', '=', $multimidias)
            ->get();

        if (count($member) > 0) {
            if ($member->each->delete()) {
                return response()->json([
                    'status' => true,
                    'message' => 'Multimidia excluida com sucesso!'
                ]);
            }
        }
        return response()->json([
            'status' => false,
            'message' => 'Multimidia informado nao existe!'
        ]);
    }

    public function update(Request $request, Multimidias $multimidias){

        $imagem0 = $request->file('imagem0');
        $imagem1 = $request->file('imagem1');
        $imagem2 = $request->file('imagem2');
        $imagem3 = $request->file('imagem3');
        $imagem4 = $request->file('imagem4');
        $imagem5 = $request->file('imagem5');
        $imagem6 = $request->file('imagem6');
        $imagem7 = $request->file('imagem7');
        $imagem8 = $request->file('imagem8');
        $imagem9 = $request->file('imagem9');
        $imagem10 = $request->file('imagem10');
        $imagem11 = $request->file('imagem11');
        $imagem12 = $request->file('imagem12');
        $imagem13 = $request->file('imagem13');
        $imagem14 = $request->file('imagem14');
        $imagem15 = $request->file('imagem15');
        $imagem16 = $request->file('imagem16');
        $imagem17 = $request->file('imagem17');
        $imagem18 = $request->file('imagem18');
        $imagem19 = $request->file('imagem19');
        
        if ($imagem0 !== null) { $imagem0 = $imagem0->store('midia'); $multimidias->imagem0 = $imagem0; }
        if ($imagem1 !== null) { $imagem1 = $imagem1->store('midia'); $multimidias->imagem1 = $imagem1; }
        if ($imagem2 !== null) { $imagem2 = $imagem2->store('midia'); $multimidias->imagem2 = $imagem2; }
        if ($imagem3 !== null) { $imagem3 = $imagem3->store('midia'); $multimidias->imagem3 = $imagem3; }
        if ($imagem4 !== null) { $imagem4 = $imagem4->store('midia'); $multimidias->imagem4 = $imagem4; }
        if ($imagem5 !== null) { $imagem5 = $imagem5->store('midia'); $multimidias->imagem5 = $imagem5; }
        if ($imagem6 !== null) { $imagem6 = $imagem6->store('midia'); $multimidias->imagem6 = $imagem6; }
        if ($imagem7 !== null) { $imagem7 = $imagem7->store('midia'); $multimidias->imagem7 = $imagem7; }
        if ($imagem8 !== null) { $imagem8 = $imagem8->store('midia'); $multimidias->imagem8 = $imagem8; }
        if ($imagem9 !== null) { $imagem9 = $imagem9->store('midia'); $multimidias->imagem9 = $imagem9; }
        if ($imagem10 !== null) { $imagem10 = $imagem10->store('midia'); $multimidias->imagem10 = $imagem10; }
        if ($imagem11 !== null) { $imagem11 = $imagem11->store('midia'); $multimidias->imagem11 = $imagem11; }
        if ($imagem12 !== null) { $imagem12 = $imagem12->store('midia'); $multimidias->imagem12 = $imagem12; }
        if ($imagem13 !== null) { $imagem13 = $imagem13->store('midia'); $multimidias->imagem13 = $imagem13; }
        if ($imagem14 !== null) { $imagem14 = $imagem14->store('midia'); $multimidias->imagem14 = $imagem14; }
        if ($imagem15 !== null) { $imagem15 = $imagem15->store('midia'); $multimidias->imagem15 = $imagem15; }
        if ($imagem16 !== null) { $imagem16 = $imagem16->store('midia'); $multimidias->imagem16 = $imagem16; }
        if ($imagem17 !== null) { $imagem17 = $imagem17->store('midia'); $multimidias->imagem17 = $imagem17; }
        if ($imagem18 !== null) { $imagem18 = $imagem18->store('midia'); $multimidias->imagem18 = $imagem18; }
        if ($imagem19 !== null) { $imagem19 = $imagem19->store('midia'); $multimidias->imagem19 = $imagem19; }
       
        $multimidias->modelo = $request->input('modelo');
        $multimidias->urlYoutube = $request->input('urlYoutube');
        $multimidias->titulo = $request->input('titulo');
        $multimidias->cartola = $request->input('cartola');
        $multimidias->texto = $request->input('texto');
        $multimidias->legenda0 = $request->input('legenda0');
        $multimidias->legenda1 = $request->input('legenda1');
        $multimidias->legenda2 = $request->input('legenda2');
        $multimidias->legenda3 = $request->input('legenda3');
        $multimidias->legenda4 = $request->input('legenda4');
        $multimidias->legenda5 = $request->input('legenda5');
        $multimidias->legenda6 = $request->input('legenda6');
        $multimidias->legenda7 = $request->input('legenda7');
        $multimidias->legenda8 = $request->input('legenda8');
        $multimidias->legenda9 = $request->input('legenda9');
        $multimidias->legenda10 = $request->input('legenda10');
        $multimidias->legenda11 = $request->input('legenda11');
        $multimidias->legenda12 = $request->input('legenda12');
        $multimidias->legenda13 = $request->input('legenda13');
        $multimidias->legenda14 = $request->input('legenda14');
        $multimidias->legenda15 = $request->input('legenda15');
        $multimidias->legenda16 = $request->input('legenda16');
        $multimidias->legenda17 = $request->input('legenda17');
        $multimidias->legenda18 = $request->input('legenda18');
        $multimidias->legenda19 = $request->input('legenda19');


        $multimidias->save();

        return $multimidias;
    }
}