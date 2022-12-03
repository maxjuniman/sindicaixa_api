<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sedes;
use DB;

class SedesController extends Controller
{
    public function index(){
        return response()->json(Sedes::all());
    }

    public function indexTeste(){
        $result = DB::table('sedes')
            ->select('id', 'texto', 'nome', 'google')
            ->limit(2)
            ->get();
        
        return response()->json($result);
    }
}