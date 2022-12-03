<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jornais extends Model
{
    protected $fillable = ['capa', 'pdf', 'titulo', 'mes', 'ano'];
}