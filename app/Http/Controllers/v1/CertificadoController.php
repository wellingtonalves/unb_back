<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\AbstractController;
use App\Models\Certificado;
use App\Services\CertificadoService;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CertificadoController extends AbstractController
{
    /**
     * @var CertificadoService
     */
    protected $service;

    /**
     * @var Certificado
     */
    protected $model;

    /**
     * CertificadoController constructor.
     * @param CertificadoService $service
     * @param Certificado $model
     */
    public function __construct(CertificadoService $service, Certificado $model)
    {
        $this->service = $service;
        $this->model = $model;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function store(Request $request)
    {
        return parent::save($request);
    }

    /**
     * @param $nrCodigoValidador
     * @return mixed
     */
    public function validar($nrCodigoValidador)
    {
        return $this->service->validar($nrCodigoValidador);
    }
}
