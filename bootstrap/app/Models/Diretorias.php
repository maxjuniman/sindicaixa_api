<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diretorias extends Model
{
    protected $fillable = ['tipo', 'nome', 'cargo', 'imagem'];
}