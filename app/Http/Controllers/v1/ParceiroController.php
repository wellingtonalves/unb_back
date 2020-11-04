<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\AbstractController;
use App\Http\Requests\ParceiroRequest;
use App\Models\Parceiro;
use App\Services\ParceiroService;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class ParceiroController extends AbstractController
{
    /**
     * @var ParceiroService
     */
    protected $service;

    /**
     * @var Parceiro
     */
    protected $model;

    public function __construct(ParceiroService $service, Parceiro $model)
    {
        $this->service = $service;
        $this->model = $model;
    }

    /**
     * @param ParceiroRequest $request
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function store(ParceiroRequest $request)
    {
        $this->authorize('store', $this->model);
        $data = $this->service->create($request);
        return Response::custom($data->statusOperacao, $data, Response::HTTP_CREATED);
    }

    /**
     * @param ParceiroRequest $request
     * @param int $id
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function update(ParceiroRequest $request, $id)
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
