<?php

namespace App\Http\Controllers;

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
        return $this->parceiroService->index($request->all());
    }
}
