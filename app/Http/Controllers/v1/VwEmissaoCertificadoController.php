<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Models\View\VwEmissaoCertificado;
use App\Services\VwEmissaoCertificadoService;

class VwEmissaoCertificadoController extends Controller
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

    /**
     * @param $idCertificado
     * @param $txOrigem
     * @return mixed
     */
    public function find($idCertificado, $txOrigem)
    {
        return $this->service->find($idCertificado, $txOrigem);
    }

}
