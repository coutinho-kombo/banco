<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function logar(Request $request)
    {
        $request->validate(
            [
                'username' => ['required', 'string', 'max:255'],
                'password' => ['required', 'string', 'min:6', 'max:255']
            ]
        );

        $credencials = array_merge($request->only('username', 'password'), ['is_verified' => 1]);
        if (Auth::attempt($credencials)) {
            return redirect()->route('home');
        } else {

            return back()->with(['error' => "Erro no Email ou Palavra-Passe"]);
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }

    public function login(){
        $data = [
            'title' => "Acesso Restrito",
            'type' => "login",
            'menu' => "Login",
            'submenu' => null,
        ];

        return view('user.login', $data);
    }

    public function create(){
        $data = [
            'title' => "Criar Conta",
            'type' => "login",
            'menu' => "Criar Conta",
            'submenu' => null,
        ];

        return view('user.create', $data);
    }

    public function contrat(){
        $data = [
            'title' => "Contrato",
            'type' => "login",
            'menu' => "Contrato",
            'submenu' => null,
        ];

        return view('user.contrat', $data);
    }
}