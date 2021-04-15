<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    protected $table = "servicos";

    protected $fillable = [
        'id_modo',
        'servico',
        'valor',
        'estado',
    ];

    public function modo_pagamento(){
        return $this->belongsTo(ModoPagamento::class, 'id_modo', 'id');
    }
}