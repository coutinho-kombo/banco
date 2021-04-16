<?php

namespace App\Http\Controllers;

use App\Conta;
use App\Movimento;
use Illuminate\Http\Request;

class ContaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contas = Conta::paginate(5);
        $data = [
            'title' => "Contas",
            'type' => "contas",
            'menu' => "Contas",
            'submenu' => "Listar",
            'getContas' => $contas,
        ];
        return view('conta.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function deposito($id){
        $conta = Conta::find($id);
        if(!$conta){
            return back()->with(['error'=>"Nao encontrou"]);
        }

        $data = [
            'title' => "Contas",
            'type' => "contas",
            'menu' => "Contas",
            'submenu' => "Depósito",
            'getConta'=>$conta,
        ];
        return view('conta.deposito', $data);
    }

    public function depositar(Request $request, $id){
        $conta = Conta::find($id);
        if(!$conta){
            return back()->with(['error'=>"Nao encontrou"]);
        }

        $request->validate([
            'valor'=>['required', 'numeric', 'min:0'],
        ]);

        $data['movimentos'] = [
            'id_conta'=>$conta->id,
            'tipo'=>"Crédito",
            'descricao'=>"Depósito de um valor",
            'valor'=>$request->valor,
            'estado'=>"on",
        ];


        if(Conta::find($id)->increment('valor_existente', $request->valor)){
            if(Movimento::create($data['movimentos'])){
                return back()->with(['success'=>"Feito com sucesso"]);
            }
        }
        
    }

    public function movimentos($id){
        $conta = Conta::find($id);
        if(!$conta){
            return back()->with(['error'=>"Conta não encontrada"]);
        }
        $data = [
            'title' => "Contas",
            'type' => "contas",
            'menu' => "Contas",
            'submenu' => "Movimentos",
            'getConta'=>$conta,
        ];
        return view('conta.movimentos', $data);
    }
}