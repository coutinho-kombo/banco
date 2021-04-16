<?php

namespace App\Http\Controllers;

use App\Servico;
use Illuminate\Http\Request;

class PagamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicos= Servico::where(['estado'=>"on"])->get();
        $data = [
            'title' => "Pagamentos",
            'type' => "pagamentos",
            'menu' => "Pagamentos",
            'submenu' => "Listar",
            'getServicos'=>$servicos,
        ];
        return view('pagamentos.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $servico = Servico::find($id);
        if(!$servico){
            return back()->with(['error'=>"Não encontrou serviço"]);
        }

        $data = [
            'title' => "Pagamentos",
            'type' => "pagamentos",
            'menu' => "Pagamentos",
            'submenu' => "Novo",
        ];

        return view('pagamentos.create', $data);
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
}