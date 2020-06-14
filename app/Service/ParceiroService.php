<?php

namespace App\Service;

use App\Entities\Parceiro;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ParceiroService extends Model
{
    public $parceiro;

    public function __construct(Parceiro $parceiro)
    {
        $this->parceiro = $parceiro;
    }
    
    public function index($parametros)
    {
        $query = $this->parceiro->select(
            'parceiro.*',
            'endereco.estado',
            'endereco.cidade'
        );

        $lat_lng = data_get($parametros, 'lat_lng');
        $cidade = data_get($parametros, 'cidade');
        $estado = data_get($parametros, 'estado');
        
        $query->join('endereco', 'endereco.parceiro_id', 'parceiro.id');
        $query->where('endereco.cidade', 'like', "%$cidade%");
        $query->where('endereco.estado', 'like', "%$estado%");
        
        if ($lat_lng) {
            list($latitude, $longitude) = explode(",", $lat_lng);
            $maxInt = PHP_INT_MAX;
            $query->select(
                [
                    'parceiro.*',
                    'endereco.estado',
                    'endereco.cidade',
                    DB::raw(
                        "IFNULL(
                            ST_DISTANCE_SPHERE(
                                localizacao,
                                ST_GeomFromText('POINT($latitude $longitude)', 4326)
                            ),
                            $maxInt
                        ) AS distance"
                    )
                ]
            );     
        }

        return $query->get();
    }

    public function store(array $data, $parceiro, $motorista)
    {
        return $parceiro->motorista()->attach($motorista->id, $data);
    }
}
