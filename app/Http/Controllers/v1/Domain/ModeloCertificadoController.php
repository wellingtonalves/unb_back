<?php

namespace App\Http\Controllers\v1\Domain;

use App\Http\Controllers\AbstractController;
use App\Http\Requests\ModeloCertificadoRequest;
use App\Models\Domain\ModeloCertificado;
use App\Services\Domain\ModeloCertificadoService;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class ModeloCertificadoController extends AbstractController
{
    /**
     * @var ModeloCertificadoService
     */
    protected $service;

    /**
     * @var ModeloCertificado
     */
    protected $model;

    public function __construct(ModeloCertificadoService $service, ModeloCertificado $model)
    {
        $this->service = $service;
        $this->model = $model;
    }
}
