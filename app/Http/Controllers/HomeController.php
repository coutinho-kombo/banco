<?php

namespace App\Http\Controllers;

use App\Conta;
use App\Movimento;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $contas = Conta::where(['estado' => "on"])->get();
        $movimentos = Movimento::where(['estado' => "on"])->get();
        $estudantes = User::where(['acesso' => "estudante"])->get();
        $conta = null;
        if (Auth::check()) {
            if (Auth::user()->acesso == "estudante") {
                $conta = Conta::where('id_usuario', Auth::user()->id)->first();
            }
        }

        $data = [
            'title' => "Banco Estudantil",
            'type' => "home",
            'menu' => "Home",
            'submenu' => null,
            'getContas' => $contas,
            'getMovimentos' => $movimentos,
            'getEstudantes' => $estudantes,
            'getConta' => $conta,
        ];
        return view('home', $data);
    }
}