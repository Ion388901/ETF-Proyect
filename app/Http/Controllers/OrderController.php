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
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;


class OrderController extends BaseController
{

    // Función de indice de la orden
    public function index(Request $req, Order $order) {
        $order = Order::all();
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

    public function transaction(Request $request) {
        Stripe::setApiKey('sk_test_S7elIE8xFX2bG9K70FqvhQhk00JEaRSDk2');
        $customer = Customer::create(array(
            'email' => $request->stripeEmail,
            'source'  => $request->stripeToken
        ));        $charge = Charge::create(array(
            'customer' => $customer->id,
            'amount'   => 90000,
            'currency' => 'usd'
        ));

        return redirect()->route('portfolios.index')->with('Pago aceptado');
    }

}