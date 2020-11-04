<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\AbstractController;
use App\Http\Requests\ModeloCertificadoRequest;
use App\Models\ModeloCertificado;
use App\Services\ModeloCertificadoService;
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

    /**
     * @param ModeloCertificadoRequest $request
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function store(ModeloCertificadoRequest $request)
    {
        $this->authorize('store', $this->model);
        $data = $this->service->create($request);
        return Response::custom($data->statusOperacao, $data, Response::HTTP_CREATED);
    }

    /**
     * @param ModeloCertificadoRequest $request
     * @param int $id
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function update(ModeloCertificadoRequest $request, $id)
    {
        $this->authorize('update', $this->model);
        $updated = $this->service->update($request, $id);
        if ($updated) {
            return Response::custom($updated, $updated, Response::HTTP_OK);
        } else {
            return Response::custom('error_operation', $updated, Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }
}
