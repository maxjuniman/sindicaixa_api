<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Historias;

class HistoriasController extends Controller
{
    public function index(){
        return response()->json(Historias::all());
    }
}