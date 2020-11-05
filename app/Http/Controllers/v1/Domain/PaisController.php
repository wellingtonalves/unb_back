<?php

namespace App\Http\Controllers\v1\Domain;

use App\Http\Controllers\AbstractController;
use App\Models\Domain\Pais;
use App\Services\Domain\PaisService;

class PaisController extends AbstractController
{
    /**
     * @var PaisService
     */
    protected $service;

    /**
     * @var Pais
     */
    protected $model;

    /**
     * SituacaoUsuarioController constructor.
     *
     * @param PaisService $service
     * @param Pais $model
     */
    public function __construct(PaisService $service, Pais $model)
    {
        $this->service = $service;
        $this->model = $model;
    }

}
