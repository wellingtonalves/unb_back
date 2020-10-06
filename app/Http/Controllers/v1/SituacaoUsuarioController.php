<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\AbstractController;
use App\Models\SituacaoUsuario;
use App\Services\SituacaoUsuarioService;

class SituacaoUsuarioController extends AbstractController
{
    /**
     * @var SituacaoUsuarioService
     */
    protected $service;

    /**
     * @var SituacaoUsuario
     */
    protected $model;

    /**
     * SituacaoUsuarioController constructor.
     *
     * @param SituacaoUsuarioService $service
     * @param SituacaoUsuario $model
     */
    public function __construct(SituacaoUsuarioService $service, SituacaoUsuario $model)
    {
        $this->service = $service;
        $this->model = $model;
    }

}
