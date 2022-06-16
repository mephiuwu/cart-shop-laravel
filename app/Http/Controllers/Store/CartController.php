<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index(){
        $cart = \Cart::getContent();
        $total = \Cart::getTotal();
        return view('store.cart', compact('cart','total'));
    }

    public function refreshCart(){
        $cart = \Cart::getContent();
        $total = \Cart::getTotal();
        return response()->json(['status' => true, 'data' => $cart, 'total' => $total, 'message' => 'Carro refrescado con éxito.']);
    }
}
