<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinciaSeeder extends Seeder
{
    static $provincias = [
        //1
        [
            'id_pais' => 1,
            'provincia' => "Namibe",
            'cidade_cede' => "Moçamedes"
        ],
        //2
        [
            'id_pais' => 1,
            'provincia' => "Benguela",
            'cidade_cede' => "Benguela"
        ],
        //3
        [
            'id_pais' => 1,
            'provincia' => "Huíla",
            'cidade_cede' => "Lubango"
        ],
        //4
        [
            'id_pais' => 1,
            'provincia' => "Cabinda",
            'cidade_cede' => "Cabinda"
        ],
        //5
        [
            'id_pais' => 1,
            'provincia' => "Malanje",
            'cidade_cede' => "Malanje"
        ],
        //6
        [
            'id_pais' => 1,
            'provincia' => "Lunda Sul",
            'cidade_cede' => "Saurimo"
        ],
        //7
        [
            'id_pais' => 1,
            'provincia' => "Lunda Norte",
            'cidade_cede' => "Dundo"
        ],
        //8
        [
            'id_pais' => 1,
            'provincia' => "Cuanza Sul",
            'cidade_cede' => "Sumbe"
        ],
        //9
        [
            'id_pais' => 1,
            'provincia' => "Cuanza Norte",
            'cidade_cede' => "Ndalatando"
        ],
        //10
        [
            'id_pais' => 1,
            'provincia' => "Uíge",
            'cidade_cede' => "Uíge"
        ],
        //11
        [
            'id_pais' => 1,
            'provincia' => "Zaire",
            'cidade_cede' => "MBanza Congo"
        ],
        //12
        [
            'id_pais' => 1,
            'provincia' => "Luanda",
            'cidade_cede' => "Luanda"
        ],
        //13
        [
            'id_pais' => 1,
            'provincia' => "Huambo",
            'cidade_cede' => "Huambo"
        ],
        //14
        [
            'id_pais' => 1,
            'provincia' => "Bié",
            'cidade_cede' => "Cuíto"
        ],
        //15
        [
            'id_pais' => 1,
            'provincia' => "Cunene",
            'cidade_cede' => "Cunene"
        ],
        //16
        [
            'id_pais' => 1,
            'provincia' => "Cuando Cubango",
            'cidade_cede' => "Menongue"
        ],
        //17
        [
            'id_pais' => 1,
            'provincia' => "Moxico",
            'cidade_cede' => "Luena"
        ],
        //18
        [
            'id_pais' => 1,
            'provincia' => "Bengo",
            'cidade_cede' => "Caxito"
        ],

    ];

    public function run()
    {
        foreach (Self::$provincias as $provincia) {
            DB::table('provincias')->insert(
                $provincia
            );
        }
    }
}