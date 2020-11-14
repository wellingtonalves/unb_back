<?php

namespace App\Http\Controllers\v1\Domain;

use App\Http\Controllers\AbstractController;
use App\Models\Domain\CriterioPrograma;
use App\Services\Domain\CriterioProgramaService;

class CriterioProgramaController extends AbstractController
{
    /**
     * @var CriterioProgramaService
     */
    protected $service;

    /**
     * @var CriterioPrograma
     */
    protected $model;

    /**
     * CriterioProgramaController constructor.
     *
     * @param CriterioProgramaService $service
     * @param CriterioPrograma $model
     */
    public function __construct(CriterioProgramaService $service, CriterioPrograma $model)
    {
        $this->service = $service;
        $this->model = $model;
    }
}
