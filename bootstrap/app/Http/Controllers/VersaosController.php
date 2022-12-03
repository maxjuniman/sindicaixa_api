<?php

namespace App\Http\Controllers;

use App\Models\Versaos;
use Illuminate\Http\Request;

class VersaosController extends Controller
{
    public function index(){
        return response()->json(Versaos::all());
    }
}