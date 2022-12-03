<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Configs;

class ConfigsController extends Controller
{


    public function index($configs){
        $configs = Configs::find($configs);
        if (!is_null($configs)) {
            return $configs;
        }
    }
}