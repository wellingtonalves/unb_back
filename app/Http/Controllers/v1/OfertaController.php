<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\AbstractController;
use App\Http\Requests\OfertaRequest;
use App\Models\Oferta;
use App\Services\OfertaService;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class OfertaController extends AbstractController
{
    /**
     * @var OfertaService
     */
    protected $service;

    /**
     * @var Oferta
     */
    protected $model;

    public function __construct(OfertaService $service, Oferta $model)
    {
        $this->service = $service;
        $this->model = $model;
    }

    /**
     * @param OfertaRequest $request
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function store(OfertaRequest $request)
    {
        $this->authorize('store', $this->model);
        $data = $this->service->create($request);
        return Response::custom('created', $data, Response::HTTP_CREATED);
    }

    /**
     * @param OfertaRequest $request
     * @param int $id
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function update(OfertaRequest $request, $id)
    {
        $this->authorize('update', $this->model);
        $updated = $this->service->update($request, $id);
        if ($updated) {
            return Response::custom('updated', $updated, Response::HTTP_OK);
        } else {
            return Response::custom('error_operation', $updated, Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }
}
