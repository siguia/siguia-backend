<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    protected $table = 'agendamento';
    
    protected $fillable = [
        'id',
        'data',
        'hora_inicio',
        'hora_fim',
        'observecao',
        'confirmado'
    ];

    public function motorista()
    {
        return $this->belongsTo(Motorista::class);
    }
}
