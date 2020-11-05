<?php

namespace App\Http\Controllers\v1\Domain;

use App\Http\Controllers\AbstractController;
use App\Models\Domain\SituacaoUsuario;
use App\Services\Domain\SituacaoUsuarioService;

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
