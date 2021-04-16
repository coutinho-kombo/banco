<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DescontoSeeder extends Seeder
{
   static $descontos = [
       [
        'id_modo'=>3,
        'desconto'=>"Abertura de Conta",
        'preco'=>100,
        'estado'=>"on",
       ], [
        'id_modo'=>4,
        'desconto'=>"Manutenção de Conta",
        'preco'=>250,
        'estado'=>"on",
       ]
   ];
   
    public function run()
    {
        foreach(Self::$descontos as $desconto){
            DB::table('descontos')->insert(
                $desconto
            );
        }
    }
}