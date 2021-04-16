<?php

namespace App\Http\Controllers;

use App\Conta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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