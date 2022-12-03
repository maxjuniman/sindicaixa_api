<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function guarding(Request $request){
        
        $news = News::create([
            'nome'=>$request->input('nome'),
            'email'=>$request->input('email'),
        ]);
        
        return $news;
    }
}