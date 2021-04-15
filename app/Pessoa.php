<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $table = "pessoas";

    protected $fillable = [
        'id_municipio',
        'nome',
        'data_nascimento',
        'genero',
        'foto',
        'telefone',
    ];

    public function municipio(){
        return $this->belongsTo(Municipio::class, 'id_municipio', 'id');
    }

    public function usuario(){
        return $this->hasMany(User::class, 'id_pessoa', 'id');
    }

    public function funcionario(){
        return $this->hasMany(Funcionario::class, 'id_pessoa', 'id');
    }
}