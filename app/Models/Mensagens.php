<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensagens extends Model
{
    protected $fillable = ['nome', 'email', 'telefone', 'assunto', 'mensagem'];
}