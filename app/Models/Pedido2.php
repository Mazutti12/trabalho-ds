<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pedido2
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nome_servico',
        'data',
        'horario',
        'usuario_id'
    ];

}   
