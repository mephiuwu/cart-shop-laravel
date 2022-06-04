<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consoles extends Model
{
    use HasFactory;
    protected $table = "consoles";
    protected $fillable = ['nombre','estado'];

    public function juegos(){
        return $this->hasMany(Juegos::class,'console_id');
    }
}
