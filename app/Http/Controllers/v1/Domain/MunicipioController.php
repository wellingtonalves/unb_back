<?php

namespace App\Http\Controllers\v1\Domain;

use App\Http\Controllers\AbstractController;
use App\Models\Domain\Municipio;
use App\Services\MunicipioService;

class MunicipioController extends AbstractController
{
    /**
     * @var MunicipioService
     */
    protected $service;

    /**
     * @var Municipio
     */
    protected $model;

    /**
     * SituacaoUsuarioController constructor.
     *
     * @param MunicipioService $service
     * @param Municipio $model
     */
    public function __construct(MunicipioService $service, Municipio $model)
    {
        $this->service = $service;
        $this->model = $model;
    }

}
