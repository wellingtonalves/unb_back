<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\AbstractController;
use App\Models\View\VwEmissaoCertificado;
use App\Services\VwEmissaoCertificadoService;
use Illuminate\Http\JsonResponse;

class VwEmissaoCertificadoController extends AbstractController
{
    /**
     * @var VwEmissaoCertificadoService
     */
    protected $service;

    /**
     * @var VwEmissaoCertificado
     */
    protected $model;

    /**
     * SituacaoUsuarioController constructor.
     *
     * @param VwEmissaoCertificadoService $service
     * @param VwEmissaoCertificado $model
     */
    public function __construct(VwEmissaoCertificadoService $service, VwEmissaoCertificado $model)
    {
        $this->service = $service;
        $this->model = $model;
    }

}
