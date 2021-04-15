<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PessoaSeeder extends Seeder
{
    static $pessoas = [
        [
            'id_municipio'=>1,
            'nome'=>"Nicolau NP",
            'genero'=>"M",
            'telefone'=>946216795,
        ],
        [
            'id_municipio'=>2,
            'nome'=>"Banco Admin",
            'genero'=>"M",
            'telefone'=>993001881,
        ],
    ];
    public function run()
    {
        foreach(Self::$pessoas as $pessoa){
            DB::table('pessoas')->insert(
                $pessoa
            );
        }
    }
}