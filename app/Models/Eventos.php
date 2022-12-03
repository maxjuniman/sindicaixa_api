<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eventos extends Model
{
    protected $fillable = ['id_sindicato', 'nome', 'data', 'hora', 'tipo', 'destaque', 'imagem'];
}