<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\AbstractController;
use App\Http\Requests\TarefaAgendadaRequest;
use App\Models\TarefaAgendada;
use App\Services\TarefaAgendadaService;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class TarefaAgendadaController extends AbstractController
{
    /**
     * @var TarefaAgendadaService
     */
    protected $service;

    /**
     * @var TarefaAgendada
     */
    protected $model;

    public function __construct(TarefaAgendadaService $service, TarefaAgendada $model)
    {
        $this->service = $service;
        $this->model = $model;
    }

    /**
     * @param TarefaAgendadaRequest $request
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function store(TarefaAgendadaRequest $request)
    {
        return parent::save($request);
    }

    /**
     * @param TarefaAgendadaRequest $request
     * @param int $id
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function update(TarefaAgendadaRequest $request, $id)
    {
        return parent::updateAs($request, $id);
    }
}
