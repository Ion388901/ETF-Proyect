<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Portfolio;
use App\Models\Contract;

class PortfolioController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $req, $order = null){
        $portfolios = Portfolio::all();
        $data = [];
        $data['portfolios'] = $portfolios;
        return view('portfolios.index', ['data' => $data]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id){
        $portfolio=Portfolio::findOrFail($id);
        return view('portfolios.show', compact('portfolio'));
    }

    // Request $req, $id
    // Poner una función de firma de contrato
    public function contractsign($id){
        $contract=Contract::findOrFail($id);
        $data = [];
        $data['contract'] = $contract;
        return view('portfolios.contractsign', ['data' => $data]);
    }

    public function signcontract(Request $req, $id){
        $contract=Contract::find($id);
        $contract->status = FALSE;
        $contract->save();
        return redirect()->route('portfolios.index')->with('success', 'Ha firmado el contrato');
    }

    // Función que muestra el carrito
    public function cart(){
        return view('cart.cart');
    }

    /**
     * Función que añade un producto al carrito
     * 
     * @param int $id
     */ 

    public function addToCart($id){
        
        $portfolio = Portfolio::find($id);
        if(!$portfolio) {
            abort(404);
        }
        $cart = session()->get('cart');

        // Si el carrito esta vacio, este es el primer producto
        if(!$cart) {
            $cart = [
                    $id => [
                        "name" => $portfolio->name,
                        "price" => $portfolio->price,
                    ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Portafolio añadido al carrito');
        }

        // Si el carrito no esta vacio, checa si este producto existe e incrementa la cantidad
        if(isset($cart[$id])) {
            return redirect()->back()->with('error', 'No puede comprar más de un portafolio a la vez');
        }

        // Si el producto no existe en el carrito, lo añade con quantity = 1
        $cart[$id] = [
            "name" => $portfolio->name,
            "price" => $portfolio->price,
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Portafolio añadido al carrito');
    }

    /**
     * 
     * Quita un producto del carrito en su totalidad
     * 
     */
    public function remove(Request $request){
        
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }
}