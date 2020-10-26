<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\AbstractController;
use App\Models\View\VwCursosRealizados;
use App\Services\VwCursosRealizadosService;

class VwCursosRealizadosController extends AbstractController
{
    /**
     * @var VwCursosRealizadosService
     */
    protected $service;

    /**
     * @var VwCursosRealizados
     */
    protected $model;

    /**
     * SituacaoUsuarioController constructor.
     *
     * @param VwCursosRealizadosService $service
     * @param VwCursosRealizados $model
     */
    public function __construct(VwCursosRealizadosService $service, VwCursosRealizados $model)
    {
        $this->service = $service;
        $this->model = $model;
    }

}
