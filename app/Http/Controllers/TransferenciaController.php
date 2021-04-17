<?php

namespace App\Http\Controllers;

use App\Conta;
use App\Movimento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TransferenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conta = Conta::where(['id_usuario'=>Auth::user()->id])->first();
        if(!$conta){
            return back()->with(['error'=>"Conta não encontrada"]);
        }
        $data = [
            'title' => "Transferência",
            'type' => "transferencia",
            'menu' => "Transferência",
            'submenu' => "Nova",
            'getConta' => $conta,
        ];
        return view('transferencia.create', $data);
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
        $request->validate([
           'conta'=>['required', 'string'],
           'valor'=>['required', 'numeric', 'min:1'],
           'password'=>['required', 'string'], 
        ]);

        $conta = Conta::where(['id_usuario' => Auth::user()->id])->first();
        if(!$conta){
            return back()->with(['error'=>"Conta nao encontrada"]);
        }

        if($request->conta == $conta->conta){
            return back()->with(['error'=>"Não deve fazer transferencia para sua propria conta"]);
        }

        $conta2 = Conta::where(['conta'=>$request->conta])->first();
        if(!$conta2){
            return back()->with(['error'=>"Conta de Destino Incorrecta"]);
        }

        if($conta->estado=="off"){
            return back()->with(['error'=>"Deve requisitar a Activação da sua Conta"]);
        }

        if($conta2->estado=="off"){
            return back()->with(['error'=>"A conta em que está transferir esta Desactivada"]);
        }
        
        $data['envio'] = [
            'id_conta' => $conta->id,
            'tipo' => "Transferencia Envio",
            'descricao' => $request->conta,
            'valor' => $request->valor,
            'estado' => "on",
        ];

        $data['recebido'] = [
            'id_conta' => $conta2->id,
            'tipo' => "Transferencia Recebido",
            'descricao' => $conta->conta,
            'valor' => $request->valor,
            'estado' => "on",
        ];
  

        if ($request->valor > $conta->valor_existente) {
            return back()->with(['error' => "Saldo insuficiente para completar a Operação: " . (number_format($conta->valor_existente, 2, ',', '.')) . "Akz"]);
        }

        if ($request->password==$conta->password) {
            /*conta de envio*/
            if (Conta::find($conta->id)->decrement('valor_existente', $request->valor)) {
                if (Movimento::create($data['envio'])) {
                    /*conta recebido*/
                    if(Conta::find($conta2->id)->increment('valor_existente', $request->valor)){
                        if (Movimento::create($data['recebido'])) {
                            return back()->with(['success' => "Feito com sucesso. ".$conta2->usuario->pessoa->nome]);
                        }
                    }
                     
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