<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\AbstractController;
use App\Http\Requests\CursoRequest;
use App\Models\Curso;
use App\Services\CursoService;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;

class CursoController extends AbstractController
{
    /**
     * @var CursoService
     */
    protected $service;

    /**
     * @var Curso
     */
    protected $model;

    /**
     * CursoController constructor.
     * @param CursoService $service
     * @param Curso $model
     */
    public function __construct(CursoService $service, Curso $model)
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
     * @param CursoRequest $request
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function store(CursoRequest $request)
    {
        return parent::save($request);
    }

    /**
     * @param CursoRequest $request
     * @param $id
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function update(CursoRequest $request, $id)
    {
        return parent::updateAs($request, $id);
    }
}
