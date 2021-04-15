<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContaSeeder extends Seeder
{
    static $contas = [
        [
            'id_usuario'=>2,
            'conta'=>"200-0002BANC",
            'valor_existente'=>2000,
            'estado'=>"on",
        ],
        
    ];

    public function run()
    {
        foreach (Self::$contas as $conta) {
            DB::table('contas')->insert(
                $conta
            );
        }
    }
}