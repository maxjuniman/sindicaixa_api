<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historias extends Model
{
    protected $fillable = ['data', 'texto', 'ano', 'imagem'];
}