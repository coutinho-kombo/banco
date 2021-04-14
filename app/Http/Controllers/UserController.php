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
                'password' => ['required', 'string', 'min:6', 'max:255']
            ]
        );

        $credencials = array_merge($request->only('email', 'password'), ['is_verified' => 1]);
        if (Auth::attempt($credencials)) {
            return redirect()->route('home');
        } else {

            return back()->with(['error' => "Erro no Email ou Palavra-Passe"]);
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