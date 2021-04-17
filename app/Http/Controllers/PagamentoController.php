<?php

namespace App\Http\Controllers;

use App\Conta;
use App\Movimento;
use App\Servico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PagamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicos = Servico::where(['estado' => "on"])->get();
        $data = [
            'title' => "Pagamentos",
            'type' => "pagamentos",
            'menu' => "Pagamentos",
            'submenu' => "Listar",
            'getServicos' => $servicos,
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
        if (!$servico) {
            return back()->with(['error' => "Não encontrou serviço"]);
        }

        $data = [
            'title' => "Pagamentos",
            'type' => "pagamentos",
            'menu' => "Pagamentos",
            'submenu' => "Novo",
            'getServico' => $servico,

        ];

        return view('pagamentos.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $servico = Servico::find($id);
        if (!$servico) {
            return back()->with(['error' => "Não encontrou serviço"]);
        }

        $conta = Conta::where(['id_usuario' => Auth::user()->id])->first();
        if(!$conta){
            return back()->with(['error'=>"Conta nao encontrada"]);
        }

        if($conta->estado=="off"){
            return back()->with(['error'=>"Deve requisitar a Activação da sua Conta"]);
        }

        $request->validate([
            'descricao' => ['required', 'min:10', 'max:40'],
            'valor' => ['required', 'numeric', 'min:1'],
            'password' => ['required', 'string']
        ]);


        $data = [
            'id_conta' => $conta->id,
            'tipo' => "Pagamento Serviço",
            'descricao' => $request->descricao . " || " . $servico->servico,
            'valor' => $request->valor,
            'estado' => "on",
        ];

        if ($servico->valor > $conta->valor_existente) {
            return back()->with(['error' => "Saldo insuficiente para completar a Operação: " . (number_format($conta->valor_existente, 2, ',', '.')) . "Akz"]);
        }

        if ($request->valor > $conta->valor_existente) {
            return back()->with(['error' => "Saldo insuficiente para completar a Operação: " . (number_format($conta->valor_existente, 2, ',', '.')) . "Akz"]);
        }

        if ($request->valor < $servico->valor) {
            return back()->with(['error' => "O valor deve ser igual a " . (number_format($servico->valor, 2, ',', '.')) . "Akz"]);
            
        }

        if ($conta->password == $request->password) {
            if (Conta::find($conta->id)->decrement('valor_existente', $data['valor'])) {
                if (Movimento::create($data)) {
                    return back()->with(['success' => "Feito com sucesso"]);
                }
            }
        } else {
            return back()->with(['error' => "Palavra-Passe incorrecta"]);
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