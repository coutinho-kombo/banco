<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MunicipioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    static $municipios = [
        //Namibe => 1
        [
            'id_provincia' => 1,
            'municipio' => "Moçamedes"
        ],
        [
            'id_provincia' => 1,
            'municipio' => "Tômbua"
        ],
        [
            'id_provincia' => 1,
            'municipio' => "Virei"
        ],
        [
            'id_provincia' => 1,
            'municipio' => "Bibala"
        ],
        [
            'id_provincia' => 1,
            'municipio' => "Camucuio"
        ],
        [
            'id_provincia' => 1,
            'municipio' => "Lucira"
        ],
        //Benguela => 2
        [
            'id_provincia' => 2,
            'municipio' => "Balombo"
        ],
        [
            'id_provincia' => 2,
            'municipio' => "Baía Farta"
        ],
        [
            'id_provincia' => 2,
            'municipio' => "Benguela"
        ],
        [
            'id_provincia' => 2,
            'municipio' => "Bocoio"
        ],
        [
            'id_provincia' => 2,
            'municipio' => "Caimbambo"
        ],
        [
            'id_provincia' => 2,
            'municipio' => "Catumbela"
        ],
        [
            'id_provincia' => 2,
            'municipio' => "Chongorói"
        ],
        [
            'id_provincia' => 2,
            'municipio' => "Cubal"
        ],
        [
            'id_provincia' => 2,
            'municipio' => "Ganda"
        ],
        [
            'id_provincia' => 2,
            'municipio' => "Lobito"
        ],
        //Huila=>3
        [
            'id_provincia' => 3,
            'municipio' => "Lubango"
        ],
        [
            'id_provincia' => 3,
            'municipio' => "Caconda"
        ],
        [
            'id_provincia' => 3,
            'municipio' => "Cacula"
        ],
        [
            'id_provincia' => 3,
            'municipio' => "Caluquembe"
        ],
        [
            'id_provincia' => 3,
            'municipio' => "Gambus"
        ],
        [
            'id_provincia' => 3,
            'municipio' => "Chicomba"
        ],
        [
            'id_provincia' => 3,
            'municipio' => "Chipindo"
        ],
        [
            'id_provincia' => 3,
            'municipio' => "Cuvango"
        ],
        [
            'id_provincia' => 3,
            'municipio' => "Humpata"
        ],
        [
            'id_provincia' => 3,
            'municipio' => "Jamba"
        ],
        [
            'id_provincia' => 3,
            'municipio' => "Matala"
        ],
        [
            'id_provincia' => 3,
            'municipio' => "Quilengues"
        ],
        [
            'id_provincia' => 3,
            'municipio' => "Quipungo"
        ],
        //Cabinda => 4
        [
            'id_provincia' => 4,
            'municipio' => "Cabinda"
        ],
        [
            'id_provincia' => 4,
            'municipio' => "Belize"
        ],
        [
            'id_provincia' => 4,
            'municipio' => "Buco-Zau"
        ],
        [
            'id_provincia' => 4,
            'municipio' => "Cacongo"
        ],
        //Malanje=>5
        [
            'id_provincia' => 5,
            'municipio' => "Cunda-Dia-Baze"
        ],
        [
            'id_provincia' => 5,
            'municipio' => "Luquembo"
        ],
        [
            'id_provincia' => 5,
            'municipio' => "Marimba"
        ],
        [
            'id_provincia' => 5,
            'municipio' => "Massango"
        ],
        [
            'id_provincia' => 5,
            'municipio' => "Mucari"
        ],
        [
            'id_provincia' => 5,
            'municipio' => "Quela"
        ],
        [
            'id_provincia' => 5,
            'municipio' => "Quirima"
        ],
        //Lunda Sul=>6
        [
            'id_provincia' => 6,
            'municipio' => "Saurimo"
        ],
        [
            'id_provincia' => 6,
            'municipio' => "Cacolo"
        ],
        [
            'id_provincia' => 6,
            'municipio' => "Dala"
        ],
        [
            'id_provincia' => 6,
            'municipio' => "Muconda"
        ],
        //Lunda Norte=>7
        [
            'id_provincia' => 7,
            'municipio' => "Dundo"
        ],
        [
            'id_provincia' => 7,
            'municipio' => "Cambulo"
        ],
        [
            'id_provincia' => 7,
            'municipio' => "Capenda-Camulemba"
        ],
        [
            'id_provincia' => 7,
            'municipio' => "Caungula"
        ],
        [
            'id_provincia' => 7,
            'municipio' => "Chitato"
        ],
        [
            'id_provincia' => 7,
            'municipio' => "Cuango"
        ],
        [
            'id_provincia' => 7,
            'municipio' => "Cuílo"
        ],
        [
            'id_provincia' => 7,
            'municipio' => "Lóvua"
        ],
        [
            'id_provincia' => 7,
            'municipio' => "Lubalo"
        ],
        [
            'id_provincia' => 7,
            'municipio' => "Lucapa"
        ],
        [
            'id_provincia' => 7,
            'municipio' => "Xá-Muteba"
        ],
        //Cuanza Sul=>8
        [
            'id_provincia' => 8,
            'municipio' => "Sumbe"
        ],
        [
            'id_provincia' => 8,
            'municipio' => "Amboim"
        ],
        [
            'id_provincia' => 8,
            'municipio' => "Cassongue"
        ],
        [
            'id_provincia' => 8,
            'municipio' => "Cela"
        ],
        [
            'id_provincia' => 8,
            'municipio' => "Conda"
        ],
        [
            'id_provincia' => 8,
            'municipio' => "Ebo"
        ],
        [
            'id_provincia' => 8,
            'municipio' => "Libolo"
        ],
        [
            'id_provincia' => 8,
            'municipio' => "Mussende"
        ],
        [
            'id_provincia' => 8,
            'municipio' => "Porto Amboim"
        ],
        [
            'id_provincia' => 8,
            'municipio' => "Quibala"
        ],
        [
            'id_provincia' => 8,
            'municipio' => "Quilenda"
        ],
        [
            'id_provincia' => 8,
            'municipio' => "Seles"
        ],
        //Cuanza Norte=>9
        [
            'id_provincia' => 9,
            'municipio' => "Ndalatando"
        ],
        [
            'id_provincia' => 9,
            'municipio' => "Ambaca"
        ],
        [
            'id_provincia' => 9,
            'municipio' => "Banga"
        ],
        [
            'id_provincia' => 9,
            'municipio' => "Bolongongo"
        ],
        [
            'id_provincia' => 9,
            'municipio' => "Cambambe"
        ],
        [
            'id_provincia' => 9,
            'municipio' => "Cazengo"
        ],
        [
            'id_provincia' => 9,
            'municipio' => "Golungo Alto"
        ],
        [
            'id_provincia' => 9,
            'municipio' => "Gonguembo"
        ],
        [
            'id_provincia' => 9,
            'municipio' => "Lucala"
        ],
        [
            'id_provincia' => 9,
            'municipio' => "Quiculungo"
        ],
        [
            'id_provincia' => 9,
            'municipio' => "Samba Caju"
        ],
        //Uige=>10
        [
            'id_provincia' => 10,
            'municipio' => "Uíge"
        ],
        [
            'id_provincia' => 10,
            'municipio' => "Alto Cauale"
        ],
        [
            'id_provincia' => 10,
            'municipio' => "Ambuíla"
        ],
        [
            'id_provincia' => 10,
            'municipio' => "Bembe"
        ],
        [
            'id_provincia' => 10,
            'municipio' => "Buengas"
        ],
        [
            'id_provincia' => 10,
            'municipio' => "Bungo"
        ],
        [
            'id_provincia' => 10,
            'municipio' => "Damba"
        ],
        [
            'id_provincia' => 10,
            'municipio' => "Milunga"
        ],
        [
            'id_provincia' => 10,
            'municipio' => "Mucaba"
        ],
        [
            'id_provincia' => 10,
            'municipio' => "Negage"
        ],
        [
            'id_provincia' => 10,
            'municipio' => "Puri"
        ],
        [
            'id_provincia' => 10,
            'municipio' => "Quimbele"
        ],
        [
            'id_provincia' => 10,
            'municipio' => "Quitexe"
        ],
        [
            'id_provincia' => 10,
            'municipio' => "Sanza Pombo"
        ],
        [
            'id_provincia' => 10,
            'municipio' => "Songo"
        ],
        [
            'id_provincia' => 10,
            'municipio' => "Zombo"
        ],
        //Zaire=>11
        [
            'id_provincia' => 11,
            'municipio' => "MBanza Congo"
        ],
        [
            'id_provincia' => 11,
            'municipio' => "Cuimba"
        ],
        [
            'id_provincia' => 11,
            'municipio' => "Nóque"
        ],
        [
            'id_provincia' => 11,
            'municipio' => "Nezeto"
        ],
        [
            'id_provincia' => 11,
            'municipio' => "Soio"
        ],
        [
            'id_provincia' => 11,
            'municipio' => "Tomboco"
        ],
        //Luanda=>12
        [
            'id_provincia' => 12,
            'municipio' => "Luanda"
        ],
        [
            'id_provincia' => 12,
            'municipio' => "Belas"
        ],
        [
            'id_provincia' => 12,
            'municipio' => "Cacuaco"
        ],
        [
            'id_provincia' => 12,
            'municipio' => "Cazenga"
        ],
        [
            'id_provincia' => 12,
            'municipio' => "Ícolo e Bendo"
        ],
        [
            'id_provincia' => 12,
            'municipio' => "Quilamba Quiaxi"
        ],
        [
            'id_provincia' => 12,
            'municipio' => "Quissama"
        ],
        [
            'id_provincia' => 12,
            'municipio' => "Talatona"
        ],
        [
            'id_provincia' => 12,
            'municipio' => "Viana"
        ],
        //Huambo=>13
        [
            'id_provincia' => 13,
            'municipio' => "Huambo"
        ],
        [
            'id_provincia' => 13,
            'municipio' => "Bailundo"
        ],
        [
            'id_provincia' => 13,
            'municipio' => "Cachiungo"
        ],
        [
            'id_provincia' => 13,
            'municipio' => "Caála"
        ],
        [
            'id_provincia' => 13,
            'municipio' => "Ecunha"
        ],
        [
            'id_provincia' => 13,
            'municipio' => "Londuimbali"
        ],
        [
            'id_provincia' => 13,
            'municipio' => "Longonjo"
        ],
        [
            'id_provincia' => 13,
            'municipio' => "Mungo"
        ],
        [
            'id_provincia' => 13,
            'municipio' => "Chicala-Choloanga"
        ],
        [
            'id_provincia' => 13,
            'municipio' => "Chinjenje"
        ],
        [
            'id_provincia' => 13,
            'municipio' => "Ucuma"
        ],
        //Bie=>14
        [
            'id_provincia' => 14,
            'municipio' => "Cuíto"
        ],
        [
            'id_provincia' => 14,
            'municipio' => "Camacupa"
        ],
        [
            'id_provincia' => 14,
            'municipio' => "Catabola"
        ],
        [
            'id_provincia' => 14,
            'municipio' => "Chinguar"
        ],
        [
            'id_provincia' => 14,
            'municipio' => "Chitembo"
        ],
        [
            'id_provincia' => 14,
            'municipio' => "Cuemba"
        ],
        [
            'id_provincia' => 14,
            'municipio' => "Cunhinga"
        ],
        [
            'id_provincia' => 14,
            'municipio' => "Nharea"
        ],
        //Cunene=>15
        [
            'id_provincia' => 15,
            'municipio' => "Ondjiva"
        ],
        [
            'id_provincia' => 15,
            'municipio' => "Cahama"
        ],
        [
            'id_provincia' => 15,
            'municipio' => "Cuanhama"
        ],
        [
            'id_provincia' => 15,
            'municipio' => "Curoca"
        ],
        [
            'id_provincia' => 15,
            'municipio' => "Cuvelai"
        ],
        [
            'id_provincia' => 15,
            'municipio' => "Namacunde"
        ],
        [
            'id_provincia' => 15,
            'municipio' => "Ombadja"
        ],
        //Cuando Cubango =>16
        [
            'id_provincia' => 16,
            'municipio' => "Menongue"
        ],
        [
            'id_provincia' => 16,
            'municipio' => "Calai"
        ],
        [
            'id_provincia' => 16,
            'municipio' => "Cuangar"
        ],
        [
            'id_provincia' => 16,
            'municipio' => "Cuchi"
        ],
        [
            'id_provincia' => 16,
            'municipio' => "Cuito Cuanavale"
        ],
        [
            'id_provincia' => 16,
            'municipio' => "Dirico"
        ],
        [
            'id_provincia' => 16,
            'municipio' => "Mavinga"
        ],
        [
            'id_provincia' => 16,
            'municipio' => "Nancova"
        ],
        [
            'id_provincia' => 16,
            'municipio' => "Rivungo"
        ],
        //Moxico=>17
        [
            'id_provincia' => 17,
            'municipio' => "Luena"
        ],
        [
            'id_provincia' => 17,
            'municipio' => "Alto Zambeze"
        ],
        [
            'id_provincia' => 17,
            'municipio' => "Bundas"
        ],
        [
            'id_provincia' => 17,
            'municipio' => "Camanongue"
        ],
        [
            'id_provincia' => 17,
            'municipio' => "Léua"
        ],
        [
            'id_provincia' => 17,
            'municipio' => "Luau"
        ],
        [
            'id_provincia' => 17,
            'municipio' => "Luacano"
        ],
        [
            'id_provincia' => 17,
            'municipio' => "Luchazes"
        ],
        [
            'id_provincia' => 17,
            'municipio' => "Cameia"
        ],
        [
            'id_provincia' => 17,
            'municipio' => "Moxico"
        ],
        //Bengo=>18
        [
            'id_provincia' => 18,
            'municipio' => "Caxito"
        ],
        [
            'id_provincia' => 18,
            'municipio' => "Ambriz"
        ],
        [
            'id_provincia' => 18,
            'municipio' => "Bula Atumba"
        ],
        [
            'id_provincia' => 18,
            'municipio' => "Dande"
        ],
        [
            'id_provincia' => 18,
            'municipio' => "Dembos"
        ],
        [
            'id_provincia' => 18,
            'municipio' => "Nambuangongo"
        ],
        [
            'id_provincia' => 18,
            'municipio' => "Pango Aluquém"
        ],
    ];

    public function run()
    {
        foreach (Self::$municipios as $municipio) {
            DB::table('municipios')->insert(
                $municipio
            );
        }
    }
}