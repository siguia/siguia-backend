<?php

namespace App\Service;

use App\Entities\Parceiro;
use Illuminate\Database\Eloquent\Model;

class ParceiroService extends Model
{
    public $parceiro;

    public function __construct(Parceiro $parceiro)
    {
        $this->parceiro = $parceiro;
    }
    
    public function index($parametros)
    {

    }
}
