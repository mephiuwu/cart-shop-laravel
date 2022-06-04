<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Models\Juegos;
use Illuminate\Http\Request;

class GamesController extends Controller
{
    function getGamesStore(){
        $games = Juegos::with('consola')->get();
        return view('store.games', compact('games'));
    }
}
