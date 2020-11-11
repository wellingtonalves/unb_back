<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\AbstractController;
use App\Models\View\VwValidacaoCertificado;
use App\Services\VwValidacaoCertificadoService;

class VwValidacaoCertificadoController extends AbstractController
{
    /**
     * @var VwValidacaoCertificadoService
     */
    protected $service;

    /**
     * @var VwValidacaoCertificado
     */
    protected $model;

    /**
     * SituacaoUsuarioController constructor.
     *
     * @param VwValidacaoCertificadoService $service
     * @param VwValidacaoCertificado $model
     */
    public function __construct(VwValidacaoCertificadoService $service, VwValidacaoCertificado $model)
    {
        $this->service = $service;
        $this->model = $model;
    }

}
