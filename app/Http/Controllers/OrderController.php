<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Http\Request;
use Auth;

use App\Models\Portfolio;
use App\Models\Order;
use App\Models\User;
use App\Models\Cart;


class OrderController extends BaseController
{

    // Función de indice de la orden
    public function index(Request $req, Order $order) {
        $data  = [];
        $data['order'] = $order;
        return view('order.review', ['data' => $data]);
    }

    public function create(Request $req, Cart $cart) {
        $order = new Order();
        $order->cart_id = $cart->id;
        $order->user_id = \Auth::user()->id;
        $order->name = $cart->name;
        $order->total = $cart->price;
        $order->status = FALSE;
        $order->save();

        return redirect()->route('order.review');
    }

    public function transaction(Request $req, Order $order){

    }

    // Función de la transacción y validación de una compra
    /*
    public function transaction(Request $req, Order $order) {
        $data = [];
        $data['order'] = $order;
        $data['transaction'] = 'transaction-done';
        $order = Order::find($order->id);
        //foreach($order->portfolios as $op) {
            $portfolio = Portfolio::find($op->id);
            $portfolio->save();
        //}    
        $order->status = TRUE;
        $order->save();
        return response()->json($data);
    }
    */
}