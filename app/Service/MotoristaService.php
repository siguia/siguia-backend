<?php

namespace App\Service;

use App\Entities\Motorista;
use Illuminate\Database\Eloquent\Model;

class MotoristaService extends Model
{
    public $motorista;

    public function __construct(
        Motorista $motorista
    ) {
        $this->motorista = $motorista;
    }
    
    public function create(array $data): Motorista
    {
        $motorista = $this->motorista->firstOrNew([
            'placa' => $data['placa']
        ]);
        $motorista->fill($data)->save();

        return $motorista;
    }
}
