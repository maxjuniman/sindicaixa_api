<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sedes extends Model
{
    protected $fillable = ['nome', 'endereco', 'cep', 'google', 'texto'];
}