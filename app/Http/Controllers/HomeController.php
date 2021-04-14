<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $data = [
            'title'=>"Banco Estudantil",
            'type'=>"home",
            'menu'=>"Home",
            'submenu'=>null,
        ];
        return view('home', $data);
    }
}