<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    protected $table = 'foto';
    
    protected $fillable = [
        'id',
        'path',
        'key',
        'bucket',
        'hash',
        'type'
    ];
}
