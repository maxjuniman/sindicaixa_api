<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sindicatos extends Model
{
    protected $fillable = ['nome', 'cnpj', 'telefone', 'celular', 'email', 'site', 'imagem', 'insta', 'twitter', 'face', 'endereco', 'numero', 'bairro', 'cidade', 'estado', 'cep', 'dataFundacao', 'emailComercial'];
}