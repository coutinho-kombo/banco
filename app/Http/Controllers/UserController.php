<?php

namespace App\Http\Controllers;

use App\Provincia;
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

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }

    public function login()
    {
        $data = [
            'title' => "Acesso Restrito",
            'type' => "login",
            'menu' => "Login",
            'submenu' => null,
        ];

        return view('user.login', $data);
    }

    public function create()
    {
        $provincias = Provincia::pluck('provincia', 'id');
        $data = [
            'title' => "Criar Conta",
            'type' => "login",
            'menu' => "Criar Conta",
            'submenu' => null,
            'getProvincias' => $provincias,
        ];

        return view('user.create', $data);
    }

    public function contrat()
    {
        $data = [
            'title' => "Contrato",
            'type' => "login",
            'menu' => "Contrato",
            'submenu' => null,
        ];

        return view('user.contrat', $data);
    }

    public function store(Request $request){
        $request->validate([
            'nome'=>['required', 'string', 'min:12', 'max:255'],
            'data'=>['required', 'date'],
            'telefone'=>['required', 'integer'],
            'genero'=>['required', 'string', 'min:1'],
            'email'=>['required', 'email', 'unique:usuarios,email'],
            'provincia'=>['required', 'integer'],
            'municipio'=>['required', 'integer'],
            'username'=>['required', 'string', 'min:10', 'max:255', 'unique:usuarios,username'],
            'password'=>['required', 'string', 'min:6', 'max:255'],
            'confirm_password'=>['required', 'string', 'min:6', 'max:255'],
            'termo'=>['required'],
        ]);
    }
}