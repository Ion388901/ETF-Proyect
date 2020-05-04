<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

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
        return view('admin.portfolios.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Request $req){
        $data = [];
        $data['portfolios'] = Portfolio::all();
        return view('admin.portfolios.create', ['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $req){
        $portfolioInput = $req->input('portfolio');
        $portfolio = Portfolio::create($portfolioInput);
        return redirect()->route('admin.portfolios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id){
        $portfolio=Portfolio::findOrFail($id);
        return view('admin.portfolios.show', compact('portfolio'));
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id){
        $portfolio = Portfolio::findOrFail($id);
        return view('admin.portfolios.edit', compact('portfolio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $req, $id){
        $req->validate([
            'portfolio.name'=>'required',
            'portfolio.description'=>'required',
            'portfolio.price'=>'required|integer'
        ]);

        Portfolio::findOrFail($id)->update($req->input('portfolio'));
        return redirect()->route('admin.portfolios.index')->with('Función realizada', 'Se actualizo la información');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product $producto
     * @return \Illuminate\Http\Response
     */

    public function destroy($id){
        Portfolio::findOrFail($id)->delete();
        return redirect()->route('admin.portfolios.index')->with('Función realizada', 'Se elimino la información');
    }

}