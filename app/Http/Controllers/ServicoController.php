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
            'getServicos' => $servicos,
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
        $modo_pagamentos = ModoPagamento::pluck('modo', 'id');
        $data = [
            'title' => "Serviços",
            'type' => "servicos",
            'menu' => "Serviços",
            'submenu' => "Novo",
            'getModoPagamento' => $modo_pagamentos,
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
        $request->validate([
            'servico' => ['required', 'string', 'min:6', 'max:255'],
            'estado' => ['required', 'string', 'min:1', 'max:3'],
            'valor' => ['required', 'numeric', 'min:0'],
            'modo' => ['required', 'integer'],
        ]);

        $data = [
            'id_modo'=>$request->modo,
            'servico'=>$request->servico,
            'valor'=>$request->valor,
            'estado'=>$request->estado,
        ];

        if(Servico::create($data)){
           return back()->with(['success'=>"Feito com sucesso"]); 
        }
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