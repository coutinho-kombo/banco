<?php

namespace App\Http\Controllers;

use App\ModoPagamento;
use App\Servico;
use Illuminate\Http\Request;

class ServicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicos = Servico::paginate(5);
        $data = [
            'title' => "Serviços",
            'type' => "servicos",
            'menu' => "Serviços",
            'submenu' => "Listar",
            'getServicos'=>$servicos,
        ];
        return view('servicos.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modo_pagamentos = ModoPagamento::where(['estado'=>"on"])->pluck('modo', 'id');
        $data = [
            'title' => "Serviços",
            'type' => "servicos",
            'menu' => "Serviços",
            'submenu' => "Novo",
            'getModoPagamento'=>$modo_pagamentos,
        ];
        return view('servicos.create', $data);
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