<?php

namespace App\Http\Controllers;

use App\Desconto;
use App\ModoPagamento;
use Illuminate\Http\Request;

class DescontosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $descontos = Desconto::paginate(5);
        $data = [
            'title' => "Descontos",
            'type' => "descontos",
            'menu' => "Descontos",
            'submenu' => "Listar",
            'getDescontos' => $descontos,
        ];
        return view('descontos.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modo_pagamento = ModoPagamento::pluck('modo', 'id');
        $data = [
            'title' => "Descontos",
            'type' => "descontos",
            'menu' => "Descontos",
            'submenu' => "Novo",
            'getModoPagamento' => $modo_pagamento,
        ];
        return view('descontos.create', $data);
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
            'desconto' => ['required', 'string', 'min:10', 'max:255', 'unique:descontos,desconto'],
            'valor' => ['required', 'numeric', 'min:1'],
            'estado' => ['required', 'string', 'min:1', 'max:3'],
            'modo' => ['required', 'integer']
        ]);

        $data = [
            'id_modo' => $request->modo,
            'desconto' => $request->desconto,
            'preco' => $request->valor,
            'estado' => $request->estado,
        ];

        if(Desconto::create($data)){
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
        $desconto = Desconto::find($id);
        if(!$desconto){
            return back()->with(['error'=>"Nao encontrou desconto"]);
        }

        $modo_pagamento = ModoPagamento::pluck('modo', 'id');
        $data = [
            'title' => "Descontos",
            'type' => "descontos",
            'menu' => "Descontos",
            'submenu' => "Novo",
            'getModoPagamento' => $modo_pagamento,
            'getDesconto'=>$desconto,
        ];
        return view('descontos.edit', $data);
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
        $desconto = Desconto::find($id);
        if(!$desconto){
            return back()->with(['error'=>"Nao encontrou desconto"]);
        }

        $request->validate([
            'desconto' => ['required', 'string', 'min:10', 'max:255'],
            'valor' => ['required', 'numeric', 'min:1'],
            'estado' => ['required', 'string', 'min:1', 'max:3'],
            'modo' => ['required', 'integer']
        ]);

        $data = [
            'id_modo' => $request->modo,
            'desconto' => $request->desconto,
            'preco' => $request->valor,
            'estado' => $request->estado,
        ];

        if(Desconto::find($id)->update($data)){
            return back()->with(['success'=>"Feito com sucesso"]);
        }
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