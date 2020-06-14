<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Opcao extends Model
{
    protected $table = 'opcao';

    protected $fillable = [
        'id',
        'descricao'
    ];
}
