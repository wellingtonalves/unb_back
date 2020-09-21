<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\AbstractController;
use App\Models\TematicaCurso;
use App\Services\TematicaCursoService;

class TematicaCursoController extends AbstractController
{
    /**
     * @var TematicaCursoService
     */
    protected $service;

    /**
     * @var TematicaCurso
     */
    protected $model;

    public function __construct(TematicaCursoService $service, TematicaCurso $model)
    {
        $this->service = $service;
        $this->model = $model;
    }
}
