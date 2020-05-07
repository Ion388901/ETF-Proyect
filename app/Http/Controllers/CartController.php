<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Portfolio;

class CartController extends Controller
{
    public function index(Request $req) {
        $cart = Cart::all();
        $data['cart'] = $cart;
        return view('cart.index', ['data' => $data]);
    }

    public function create(Request $req, Portfolio $portfolio) {
        //if ($portfolio->cart) {
        //    return ('El carrito ya contiene un portafolio');
        //}

        $cart = new Cart();
        $cart->portfolio_id = $portfolio->id;
        $cart->name = $portfolio->name;
        $cart->price = $portfolio->price;
        $cart->save();

        return redirect()->route('cart.index');
    }

    public function delete(){

    }

    public function checkout(){

    }
    
}