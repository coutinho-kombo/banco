<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModoPagamentoSeeder extends Seeder
{
    static $modos = [
        [
            'modo'=>"Trimestral"
        ],[
            'modo'=>"Anual"
        ],[
            'modo'=>"Temporal"
        ],[
            'modo'=>"Mensal"
        ],
    ];
    
    public function run()
    {
        foreach(Self::$modos as $modo){
            DB::table('modo_pagamentos')->insert(
                $modo
            );
        }
    }
}