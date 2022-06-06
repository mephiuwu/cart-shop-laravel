<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Models\Juegos;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GamesController extends Controller
{
    public function getGamesStore(){
        $games = Juegos::with('consola')->get();
        return view('store.games', compact('games'));
    }

    public function addGamesCart(Request $request){
        try {
            $game = Juegos::find($request->idGame);

            if (!$game) {
                throw 'El juego seleccionado no existe.';
            }
            
            \Cart::session(Auth::user()->id)->add([
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

    public function refreshCart(){
        $cart = \Cart::session(Auth::user()->id)->getContent();
        return response()->json(['status' => true, 'data' => $cart, 'message' => 'Carro refrescado con éxito.']);
    }
}
