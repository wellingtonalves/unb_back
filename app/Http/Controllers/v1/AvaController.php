<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\AbstractController;
use App\Http\Requests\AvaRequest;
use App\Models\Ava;
use App\Services\AvaService;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class AvaController extends AbstractController
{
    /**
     * @var AvaService
     */
    protected $service;

    /**
     * @var Ava
     */
    protected $model;

    public function __construct(AvaService $service, Ava $model)
    {
        $this->service = $service;
        $this->model = $model;
    }

    /**
     * @param AvaRequest $request
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function store(AvaRequest $request)
    {
        $this->authorize('store', $this->model);
        $data = $this->service->create($request);
        return Response::custom($data->statusOperacao, $data, Response::HTTP_CREATED);
    }

    /**
     * @param AvaRequest $request
     * @param int $id
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function update(AvaRequest $request, $id)
    {
        return parent::updateAs($request, $id);
    }
}
