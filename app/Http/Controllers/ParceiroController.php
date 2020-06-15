<?php

namespace App\Http\Controllers;

use App\Entities\Motorista;
use App\Entities\Parceiro;
use App\Service\ParceiroService;
use Illuminate\Http\Request;

class ParceiroController extends Controller
{
    public $parceiroService;

    public function __construct(ParceiroService $parceiroService)
    {
        $this->parceiroService = $parceiroService;
    }

    public function index(Request $request)
    {
        $parametros = $request->all();
        $lat_lng = data_get($parametros, 'lat_lng');
        $cidade = data_get($parametros, 'search');
        $estado = data_get($parametros, 'search');
        return $this->parceiroService->index($lat_lng, $cidade, $estado);
    }

    public function store(Request $request, Parceiro $parceiro)
    {
        return $this->parceiroService->store($request->all(), $parceiro);
    }

    public function getId(Request $request, Parceiro $parceiro)
    {
        return $this->parceiroService->getId($parceiro);
    }
}
