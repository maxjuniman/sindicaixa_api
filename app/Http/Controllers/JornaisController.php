<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jornais;

class JornaisController extends Controller
{
    public function index(){
        return response()->json(Jornais::all());
    }

    public function show($jornais){
        $jornais = Jornais::find($jornais);
        if (!is_null($jornais)) {
            return $jornais;
        }
    }

    public function guarding(Request $request){

        //store file into document folder
        if ($request->capa == null) { $capa = null; }else{ $capa = $request->capa->store('jornal'); }
        if ($request->pdf == null) { $pdf = null; }else{ $pdf = $request->pdf->store('jornal'); }

        //store your file into database
        $document = new Jornais();
        $document->mes = $request->mes;
        $document->ano = $request->ano;
        $document->titulo = $request->titulo;
        
        $document->capa = $capa;
        $document->pdf = $pdf;
        
        $document->save();
        return $document;
    }

    public function del($jornais)
    {
        $member = Jornais::where('id', '=', $jornais)
            ->get();

        if (count($member) > 0) {
            if ($member->each->delete()) {
                return response()->json([
                    'status' => true,
                    'message' => 'Jornal excluido com sucesso!'
                ]);
            }
        }
        return response()->json([
            'status' => false,
            'message' => 'Jornal informado nao existe!'
        ]);
    }

    public function update(Request $request, Jornais $jornais){

        $capa = $request->file('capa');
        $pdf = $request->file('pdf');
        
        
        if ($capa !== null) { $capa = $capa->store('midia'); $jornais->capa = $capa; }
        if ($pdf !== null) { $pdf = $pdf->store('midia'); $jornais->pdf = $pdf; }
        
       
        $jornais->mes = $request->input('mes');
        $jornais->ano = $request->input('ano');
        $jornais->titulo = $request->input('titulo');
       
        $jornais->save();

        return $jornais;
    }
}