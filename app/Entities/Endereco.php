<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $table = 'endereco';

    protected $fillable = [
        'id',
        'bairro',
        'estado',
        'cidade',
        'rua',
        'numero'
    ];


    public function getLocalizacaoAttribute()
    {
        return '';
    }
}
