<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Juegos extends Model
{
    use HasFactory;
    protected $table = "juegos";
    protected $fillable = ['nombre', 'url', 'descripcion','imagen','estado'];
}