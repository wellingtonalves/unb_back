<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\AbstractController;
use App\Http\Requests\ExclusividadeOfertaRequest;
use App\Models\ExclusividadeOferta;
use App\Services\ExclusividadeOfertaService;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;

class ExclusividadeOfertaController extends AbstractController
{
    /**
     * @var ExclusividadeOfertaService
     */
    protected $service;

    /**
     * @var ExclusividadeOferta
     */
    protected $model;

    public function __construct(ExclusividadeOfertaService $service, ExclusividadeOferta $model)
    {
        $this->service = $service;
        $this->model = $model;
    }

    /**
     * @param ExclusividadeOfertaRequest $request
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function store(ExclusividadeOfertaRequest $request)
    {
        return parent::save($request);
    }

    /**
     * @param ExclusividadeOfertaRequest $request
     * @param int $id
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function update(ExclusividadeOfertaRequest $request, $id)
    {
        return parent::updateAs($request, $id);
    }
}
