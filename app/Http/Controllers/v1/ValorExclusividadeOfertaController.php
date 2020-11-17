<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\AbstractController;
use App\Http\Requests\ValorExclusividadeOfertaRequest;
use App\Models\ValorExclusividadeOferta;
use App\Services\ValorExclusividadeOfertaService;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;

class ValorExclusividadeOfertaController extends AbstractController
{
    /**
     * @var ValorExclusividadeOfertaService
     */
    protected $service;

    /**
     * @var ValorExclusividadeOferta
     */
    protected $model;

    public function __construct(ValorExclusividadeOfertaService $service, ValorExclusividadeOferta $model)
    {
        $this->service = $service;
        $this->model = $model;
    }

    /**
     * @param ValorExclusividadeOfertaRequest $request
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function store(ValorExclusividadeOfertaRequest $request)
    {
        return parent::save($request);
    }

    /**
     * @param ValorExclusividadeOfertaRequest $request
     * @param int $id
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function update(ValorExclusividadeOfertaRequest $request, $id)
    {
        return parent::updateAs($request, $id);
    }
}
