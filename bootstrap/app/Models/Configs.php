<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configs extends Model
{
    protected $fillable = ['tipoLogin', 'corPrimaria', 'corSecundaria', 'corTerciaria'];
}