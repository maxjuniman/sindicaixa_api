<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Links extends Model
{
    protected $fillable = ['nome', 'texto', 'imagem', 'site', 'insta', 'face', 'twitter', 'youtube', 'whats', 'email'];
}