<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movimento extends Model
{
    protected $table = "movimentos";

    protected $fillable = [
        'id_conta',
        'tipo',
        'valor',
        'estado',
    ];

    public function conta(){
        return $this->belongsTo(Conta::class, 'id_conta', 'id');
    }
}