<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\AbstractController;
use App\Models\Certificado;
use App\Models\CertificadoPrograma;
use App\Services\CertificadoProgramaService;
use App\Services\CertificadoService;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CertificadoProgramaController extends AbstractController
{
    /**
     * @var CertificadoProgramaService
     */
    protected $service;

    /**
     * @var CertificadoPrograma
     */
    protected $model;

    /**
     * CertificadoProgramaController constructor.
     * @param CertificadoProgramaService $service
     * @param CertificadoPrograma $model
     */
    public function __construct(CertificadoProgramaService $service, CertificadoPrograma $model)
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
}
