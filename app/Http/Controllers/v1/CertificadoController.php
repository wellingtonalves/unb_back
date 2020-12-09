<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\AbstractController;
use App\Http\Requests\CertificadoRequest;
use App\Models\Certificado;
use App\Services\CertificadoService;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;

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
     * @param CertificadoRequest $request
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function store(CertificadoRequest $request)
    {
        return parent::save($request);
    }

    /**
     * @param CertificadoRequest $request
     * @param $id
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function update(CertificadoRequest $request, $id)
    {
        return parent::updateAs($request, $id);
    }
}
