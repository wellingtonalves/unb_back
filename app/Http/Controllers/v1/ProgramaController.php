<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\AbstractController;
use App\Http\Requests\ProgramaRequest;
use App\Models\Programa;
use App\Services\ProgramaService;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;

class ProgramaController extends AbstractController
{
    /**
     * @var ProgramaService
     */
    protected $service;

    /**
     * @var Programa
     */
    protected $model;

    /**
     * ProgramaController constructor.
     * @param ProgramaService $service
     * @param Programa $model
     */
    public function __construct(ProgramaService $service, Programa $model)
    {
        $this->service = $service;
        $this->model = $model;
    }

    /**
     * @return JsonResponse|mixed
     */
    public function index()
    {
        return $this->service->all();
    }

    /**
     * @param $id
     * @return JsonResponse|mixed
     * @throws Exception
     */
    public function show($id)
    {
        return $this->service->find($id);
    }

    /**
     * @param ProgramaRequest $request
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function store(ProgramaRequest $request)
    {
        return parent::save($request);
    }

    /**
     * @param ProgramaRequest $request
     * @param $id
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function update(ProgramaRequest $request, $id)
    {
        return parent::updateAs($request, $id);
    }
}
