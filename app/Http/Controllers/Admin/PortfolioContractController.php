<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use App\Models\Contract;

class PortfolioContractController extends BaseController
{
    /**
     * 
     * Crea un nuevo contract_portfolio en esa tabla, recibe valores del modelo de contract y portfolio. 
     * Estos son usados para asignar un portafolio a un contrato
     * 
     */
    public function create(Request $req, Contract $contract) {
        $data = [];
        $data['contract'] = $contract;
        $data['portfolios'] = Portfolio::all();
        return view('admin.contracts.portfolio.create', ['data' => $data]);
    }
    
    /**
     * 
     * Guarda el nuevo contract_portfolio en esa tabla, guarda valores del modelo de contract y portfolio. 
     * Estos son usados para asignar un portafolio a un contrato
     * 
     */
    public function store(Request $req, Contract $contract) {
        $portfolio = Portfolio::find($req->input('contract_portfolio.portfolio_id'));
        $contract->portfolios()->attach($portfolio->id);
        return redirect()->route('admin.contracts.show', ['contract' => $contract]);
    }
}