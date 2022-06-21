<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Models\CommentUserGame;
use App\Models\Juegos;
use Illuminate\Http\Request;

class GamesController extends Controller
{
    public function getStore(){
        $games = Juegos::with('consola')->paginate(8);
        return view('store.games', compact('games'));
    }

    public function addCart(Request $request){
        try {
            $game = Juegos::find($request->idGame);
            
            if (!$game) {
                throw 'El juego seleccionado no existe.';
            }

            \Cart::add([
                'id' => $game->id,
                'name' => $game->nombre,
                'price' => $game->price,
                'quantity' => 1,
                'attributes' => [
                    'image' => $game->imagen
                ]
            ]);
            
            return response()->json(['status' => true, 'data' => $game, 'message' => 'Juego agregado al carrito.']);
        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'message' => 'Ha ocurrido un error interno', 'th' => $th->getMessage()]);
        }
    }

    public function single($id){
        $game = Juegos::find($id);
        $games = Juegos::with('consola')->where('id','!=',$game->id)->where(function($query) use ($game){
            $query->orWhere('console_id', $game->console_id);
        })->get();
        $comments = CommentUserGame::with('user')->where('game_id', $game->id)->get();
        return view('store.games.single', compact('game', 'comments', 'games'));
    }
}
