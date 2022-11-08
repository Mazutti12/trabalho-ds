<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pedido
{
    use HasFactory;

    protected $fillable = [
        'id',
        'data_fim',
        'data_inicio',
        'usuario_id'
    ];

}
