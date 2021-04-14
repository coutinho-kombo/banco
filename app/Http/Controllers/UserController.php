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
                'email' => ['required', 'string', 'email', 'max:255'],
                'palavra_passe' => ['required', 'string', 'min:6', 'max:255']
            ]
        );

        $credencials = $request->only('email', 'palavra_passe');
        if (Auth::attempt($credencials)) {
            return redirect()->route('home');
        } else {
            return back()->with(['error' => "E-mail ou Palavra-Passe Incorrectos"]);
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
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
}