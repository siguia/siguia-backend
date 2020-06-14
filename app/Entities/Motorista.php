<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Motorista extends Model
{
    protected $table = 'motorista';

    protected $fillable = [
        'id',
        'nome',
        'placa',
        'telefone'
    ];
}
