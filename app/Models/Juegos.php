<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Juegos extends Model
{
    use HasFactory;
    protected $table = "juegos";
    protected $fillable = ['nombre', 'url', 'descripcion','imagen','quantity','price','estado','console_id'];

    public function consola(){
        return $this->belongsTo(Consoles::class,'console_id');
    }

    public function comments(){
        return $this->hasMany(CommentUserGame::class,'game_id');
    }
}
