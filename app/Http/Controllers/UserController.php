<?php

namespace App\Http\Controllers;

use App\Conta;
use App\Pessoa;
use App\Provincia;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function store(Request $request)
    {
        $request->validate([
            'nome' => ['required', 'string', 'min:12', 'max:255'],
            'data' => ['required', 'date'],
            'telefone' => ['required', 'integer'],
            'genero' => ['required', 'string', 'min:1'],
            'email' => ['required', 'email', 'unique:usuarios,email'],
            'provincia' => ['required', 'integer'],
            'municipio' => ['required', 'integer'],
            'username' => ['required', 'string', 'min:10', 'max:255', 'unique:usuarios,username'],
            'password' => ['required', 'string', 'min:6', 'max:255'],
            'confirm_password' => ['required', 'string', 'min:6', 'max:255'],
            'termo' => ['required'],
            'termo.*' => ['string'],
        ]);

        if ($request->password != $request->confirm_password) {
            return back()->with(['error' => "Nome de Usuário e Palavra-Passe diferentes"]);
        }

        $data['user'] = [
            'id_pessoa' => null,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'estado' => "on",
            'acesso' => "estudante",
            'email' => $request->email,
            'is_verified' => 1,
        ];

        $data['person'] = [
            'id_municipio' => $request->id_municipio,
            'nome' => $request->nome,
            'data_nascimento' => $request->data,
            'genero' => $request->genero,
            'foto' => null,
            'telefone' => $request->telefone,
        ];

        $data['count'] = [
            'id_usuario'=>null,
            'conta'=>null,
            'valor_existente'=>0,
            'estado'=>"off",
        ];

        if ($request->hasFile('foto') && $request->foto->isValid()) {
            $request->validate([
                'foto' => ['required', 'mimes:jpg,jpeg,png,JPG,JPEG,PNG', 'max:5000']
            ]);
            $path = $request->file('foto')->store('img_estudantes');
            $data['person']['foto'] = $path;
        }

        $person = Pessoa::create($data['person']);
        if($person){
            $data['person']['id_pessoa'] = $person->id;
            $user = User::create($data['user']);
            if($user){
                $data['count']['id_usuario']=$user->id;
                $data['count']['conta']=$user->id."00-000".$person->id."BANC";
                $conta = Conta::create($data['count']);
                if($conta){
                    return back()->with(['success'=>"Cadastro feito com sucesso"]);
                }
            }
        }
    }
}