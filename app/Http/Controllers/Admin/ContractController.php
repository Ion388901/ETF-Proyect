<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

use App\Models\Contract;
use App\Models\Portfolio;

class ContractController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $req, $order = null){
        $contracts = Contract::all();
        $data = [];
        $data['contracts'] = $contracts;
        return view('admin.contracts.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Request $req){
        $data = [];
        $data['portfolios'] = Portfolio::all();
        return view('admin.contracts.create', ['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $req){
        $contractInput = $req->input('contract');
        $contract = Contract::create($contractInput);
        return redirect()->route('admin.contracts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id){
        $contract=Contract::findOrFail($id);
        $data = [];
        $data['contract'] = $contract;
        return view('admin.contracts.show', ['data' => $data]);
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id){
        $contract = Contract::findOrFail($id);
        $data = [];
        $data['contract'] = $contract;
        $data['portfolios'] = Portfolio::all();
        return view('admin.contracts.edit', ['data' => $data]);
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
            'contract.name'=>'required',
            'contract.description'=>'required'
            //'contract.status'=>'required|boolean'
        ]);
        $contract = Contract::findOrFail($id);
        $contract->update($req->input('contract'));
        $portfolio = Portfolio::find($req->input('portfolio.portfolio_id'));
        $contract->portfolios()->attach($portfolio->id);
        return redirect()->route('admin.contracts.index')->with('Función realizada', 'Se actualizo la información');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Collection $collection
     * @return \Illuminate\Http\Response
     */

    public function destroy($id){
        Contract::findOrFail($id)->delete();
        return redirect()->route('admin.contracts.index')->with('Función realizada', 'Se elimino la información');
    }
}