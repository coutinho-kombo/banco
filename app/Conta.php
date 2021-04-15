<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conta extends Model
{
    protected $table = "contas";

    protected $fillable = [
        'id_usuario',
        'conta',
        'valor_existente',
        'estado',
    ];

    public function usuario(){
        return $this->belongsTo(User::class, 'id_usuario', 'id');
    }
}