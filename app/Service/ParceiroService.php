<?php

namespace App\Service;

use App\Entities\Parceiro;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ParceiroService extends Model
{
    public $parceiro;
    public $motorista;

    public function __construct(
        Parceiro $parceiro,
        MotoristaService $motorista
    ) {
        $this->parceiro = $parceiro;
        $this->motorista = $motorista;
    }

    /**
     * mostrar o que existe mais perto do destino
     * mostrar a distancia da origem a cada lugar perto do destino
     */
    public function index($lat_lng, $cidade, $estado)
    {
        $query = $this->parceiro->select(
            'parceiro.*'
        );

        $query->join('endereco', 'endereco.parceiro_id', 'parceiro.id');

        if ($cidade) {
            $query->where('endereco.cidade', 'like', "%$cidade%");
        }

        if ($estado) {
            $query->where('endereco.estado', 'like', "%$estado%");
        }

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
        $query->with(['endereco']);
        return $query->get();
    }

    public function getCidadeEstadoFromLatLong($lat_lng)
    {
        // implementar recuperar cidade estado por $lat_lng;
        return [
            'cidade' => 'Belo Horizonte',
            'estado' => 'Minas Gerais',
        ];
    }

    public function store(array $data, $parceiro)
    {
        $motorista = $this->motorista->create($data['motorista']);

        return $parceiro->motorista()->attach($motorista->id, $data['agenda']);
    }

    public function getId(Parceiro $parceiro)
    {
        return $parceiro->load(['endereco', 'foto']);
    }
}
