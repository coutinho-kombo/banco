<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModoPagamento extends Model
{
    protected $table = "modo_pagamentos";
    
    protected $fillable = [
        'modo',
    ];

    public function servico(){
        return $this->hasMany(Servico::class, 'id_modo', 'id');
    }

    public function desconto(){
        return $this->hasMany(Desconto::class, 'id_modo', 'id');
    }
}