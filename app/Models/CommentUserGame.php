<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentUserGame extends Model
{
    use HasFactory;
    protected $table = "comment_user_game";
    protected $fillable = ['comment'];

    public function game(){
        return $this->belongsTo(Juegos::class,'game_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
