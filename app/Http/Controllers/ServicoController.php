<?php

namespace App\Http\Controllers;

use App\Conta;
use App\ModoPagamento;
use App\Servico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
            'id_modo' => $request->modo,
            'servico' => $request->servico,
            'valor' => $request->valor,
            'estado' => $request->estado,
        ];

        if (Servico::create($data)) {
            return back()->with(['success' => "Feito com sucesso"]);
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
        $servico = Servico::find($id);
        if (!$servico) {
            return back()->with(['error' => "Serviço não encontrado"]);
        }
        $modo_pagamentos = ModoPagamento::pluck('modo', 'id');
        $data = [
            'title' => "Serviços",
            'type' => "servicos",
            'menu' => "Serviços",
            'submenu' => "Editar",
            'getModoPagamento' => $modo_pagamentos,
            'getServico' => $servico,
        ];
        return view('servicos.edit', $data);
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
        $servico = Servico::find($id);
        if (!$servico) {
            return back()->with(['error' => "Serviço não encontrado"]);
        }

        $request->validate([
            'servico' => ['required', 'string', 'min:6', 'max:255'],
            'estado' => ['required', 'string', 'min:1', 'max:3'],
            'valor' => ['required', 'numeric', 'min:0'],
            'modo' => ['required', 'integer'],
        ]);

        $data1 = [
            'id_modo' => $request->modo,
            'servico' => $request->servico,
            'valor' => $request->valor,
            'estado' => $request->estado,
        ];

        $data2 = [
            'email' => null,
            'valor_actual'=>$request->valor,
            'valor_antigo'=>$servico->valor,
            'servico'=>$servico->servico,
        ];

        $contas = Conta::where(['estado'=>"on"])->get();
        if (($request->valor != $servico->valor) || ($request->modo!=$servico->id_modo)) {
            foreach($contas as $conta){
                if($conta->usuario->acesso=="estudante"){
                    
                    $data2['email']=$conta->usuario->email;
                }

                Mail::send('email.mail', $data2, function ($message) use ($data2) {
                    $message->from('coutinho77Kombo@gmail.com', 'Banco BANC');
                    $message->subject('Mudança do preço dos Serviços');
                    $message->to($data2['email']);
                });
            }   
        }
       if (Servico::find($servico->id)->update($data1)) {
            return back()->with(['success' => "Feito com sucesso"]);
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