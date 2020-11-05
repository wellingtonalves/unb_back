<?php

namespace App\Http\Controllers\v1\Domain;

use App\Http\Controllers\AbstractController;
use App\Models\Domain\UF;
use App\Services\Domain\UfService;

class UfController extends AbstractController
{
    /**
     * @var UfService
     */
    protected $service;

    /**
     * @var UF
     */
    protected $model;

    /**
     * SituacaoUsuarioController constructor.
     *
     * @param UfService $service
     * @param UF $model
     */
    public function __construct(UfService $service, UF $model)
    {
        $this->service = $service;
        $this->model = $model;
    }

}
