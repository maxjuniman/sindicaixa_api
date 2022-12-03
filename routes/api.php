<?php

use Illuminate\Http\Request;

//LOGIN
Route::post("auth/login", "App\Http\Controllers\AuthController@login");
Route::post("senha/email", "App\Http\Controllers\NovaSenhasController@forgot");
Route::post("senha/reset", "App\Http\Controllers\NovaSenhasController@reset")->name("password.email");
Route::post("senha/validation", "App\Http\Controllers\RecuperarSenhasController@validation");

// SITE
Route::get("noticiasDestaque", "App\Http\Controllers\NoticiasController@showDestaque");
Route::get("noticiasOrder", "App\Http\Controllers\NoticiasController@order");
Route::get("noticiasPage", "App\Http\Controllers\NoticiasController@page");
Route::get("busca/{noticias}", "App\Http\Controllers\NoticiasController@busca");
Route::get("historias", "App\Http\Controllers\HistoriasController@index");
Route::get("sedes", "App\Http\Controllers\SedesController@index");
Route::get("diretorias", "App\Http\Controllers\DiretoriasController@index");
Route::get("diretorias/{diretorias}", "App\Http\Controllers\DiretoriasController@tipo");
Route::get("links", "App\Http\Controllers\LinksController@index");
Route::get("multimidias", "App\Http\Controllers\MultimidiasController@index");
Route::get("multimidias/home", "App\Http\Controllers\MultimidiasController@home");
Route::get("jornais", "App\Http\Controllers\JornaisController@index");
Route::get("noticias/{noticias}", "App\Http\Controllers\NoticiasController@noticiaId");
Route::get("noticias/off/{noticias}", "App\Http\Controllers\NoticiasController@noticiaOffId");
Route::post("news", "App\Http\Controllers\NewsController@guarding");
Route::post("mensagens", "App\Http\Controllers\MensagensController@guarding");

// VERSAO
Route::get("versao", "App\Http\Controllers\VersaosController@index");
Route::get("configs/{configs}", "App\Http\Controllers\ConfigsController@index");

Route::group(['middleware' => ['jwt.verify']], function() {
    // LOGIN
    Route::post("auth/register", "App\Http\Controllers\AuthController@register");
    Route::get("auth/login", "App\Http\Controllers\AuthController@index");
    Route::get("user", "App\Http\Controllers\AuthController@showUser");
    Route::get("user/{user}", "App\Http\Controllers\AuthController@userId");
    
    // PERMISSOES
    Route::post("permissoes", "App\Http\Controllers\PermissoesController@guarding");
    Route::get("permissoes/{permissoes}", "App\Http\Controllers\PermissoesController@permissao");
    
    // MENU EXISTENTE
    Route::get("menu", "App\Http\Controllers\MenuController@index");
    
    // NOTICIAS
    Route::get("noticias", "App\Http\Controllers\NoticiasController@index");
    Route::delete("noticias/{noticias}", "App\Http\Controllers\NoticiasController@del");
    Route::post("noticias", "App\Http\Controllers\NoticiasController@guarding");
    Route::post("noticias/{noticias}", "App\Http\Controllers\NoticiasController@update");
    
    // LINKS
    Route::delete("links/{links}", "App\Http\Controllers\LinksController@del");
    Route::get("links/{links}", "App\Http\Controllers\LinksController@show");
    Route::post("links", "App\Http\Controllers\LinksController@guarding");
    Route::post("links/{links}", "App\Http\Controllers\LinksController@update");
    
    // MULTIMIDIAS
    Route::get("multimidias/{multimidias}", "App\Http\Controllers\MultimidiasController@show");
    Route::delete("multimidias/{multimidias}", "App\Http\Controllers\MultimidiasController@del");
    Route::post("multimidias", "App\Http\Controllers\MultimidiasController@guarding");
    Route::post("multimidias/{multimidias}", "App\Http\Controllers\MultimidiasController@update");
    
    // JORNAIS
    Route::get("jornais/{jornais}", "App\Http\Controllers\JornaisController@show");
    Route::post("jornais", "App\Http\Controllers\JornaisController@guarding");
    Route::delete("jornais/{jornais}", "App\Http\Controllers\JornaisController@del");
    Route::post("jornais/{jornais}", "App\Http\Controllers\JornaisController@update");
    









    // SINDICATOS
    Route::get("sindicatos", "App\Http\Controllers\SindicatosController@index");
    Route::post("sindicatos", "App\Http\Controllers\SindicatosController@guarding");
    Route::get("sindicatos/{sindicatos}", "App\Http\Controllers\SindicatosController@show");
    Route::get("sindicatos/{sindicatos}/diretoria", "App\Http\Controllers\SindicatosController@diretoria");
    Route::get("sindicatos/{sindicatos}/delegado", "App\Http\Controllers\SindicatosController@delegado");
    Route::get("sindicatos/detalhes/{sindicatos}", "App\Http\Controllers\SindicatosDetalhesController@show");

    // EVENTOS POR SINDICATO
    Route::get("eventos/{eventos}", "App\Http\Controllers\EventosController@show");

    // JURIDICO
    Route::get("juridico", "App\Http\Controllers\JuridicoController@index");
    Route::post("juridico", "App\Http\Controllers\JuridicoController@guarding");

    // SINDICALIZADOS
    Route::post("sindicalizados", "App\Http\Controllers\SindicalizadosController@register");
    Route::get("sindicalizados/{sindicalizados}", "App\Http\Controllers\SindicalizadosController@index");
    Route::post("sindicalizados/{sindicalizados}", "App\Http\Controllers\AuthController@update");
    Route::delete("sindicalizados/{sindicalizados}", "App\Http\Controllers\SindicalizadosController@del");
});