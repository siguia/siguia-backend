<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Parceiro extends Model
{
    protected $table = 'parceiro';

    protected $fillable = [
        'id',
        'nome',
        'classificacao',
        'telefone'
    ];

    public function endereco()
    {
        return $this->hasOne(Endereco::class);
    }

    public function foto()
    {
        return $this->hasMany(Foto::class);
    }

    public function opcao()
    {
        return $this->belongsToMany(Opcao::class, 'parceiro_opcao');
    }

    public function agendamento()
    {
        return $this->hasMany(Agendamento::class)->with(['motorista']);
    }

    public function motorista()
    {
        return $this->belongsToMany(Motorista::class, 'agendamento');
    }
}
