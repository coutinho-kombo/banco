<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Desconto extends Model
{
    protected $table = "descontos";

    protected $fillable = [
        'id_modo',
        'desconto',
        'preco',
        'estado',
    ];

    public function modo_pagamento(){
        return $this->belongsTo(ModoPagamento::class, 'id_modo', 'id');
    }

}