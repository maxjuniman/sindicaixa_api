<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SindicatosDetalhes extends Model
{
    protected $fillable = ['id_sindicato', 'insta', 'twitter', 'face', 'endereco', 'numeroEnd', 'bairro', 'cidade', 'estado', 'cep', 'dataFundacao'];
}