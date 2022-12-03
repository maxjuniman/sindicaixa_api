<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DiretoriasController extends Controller
{
    public function index(){
        return response()->json(Historias::all());
    }
}