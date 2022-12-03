<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noticias extends Model
{
    protected $fillable = ['modelo', 'dataInicio', 'horaInicio', 'dataFinal', 'horaFinal', 'picture', 'posicaoImg', 'urlYoutube', 'audio', 'posicaoVideo', 'posicaoAudio', 'insta', 'face', 'titulo', 'cartola', 'fonte', 'email', 'texto', 'color', 'colorDuplo', 'dataPublicacao', 'chamada'];
}