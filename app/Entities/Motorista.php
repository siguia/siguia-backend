<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Motorista extends Model
{
    protected $table = 'motorista';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'name',
        'placa',
        'telefone'
    ];
}
