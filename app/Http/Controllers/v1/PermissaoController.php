<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\AbstractController;
use App\Http\Requests\PermissaoRequest;
use App\Models\Permissao;
use App\Services\PermissaoService;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;

class PermissaoController extends AbstractController
{
    /**
     * @var PermissaoService
     */
    protected $service;

    /**
     * @var Permissao
     */
    protected $model;

    public function __construct(PermissaoService $service, Permissao $model)
    {
        $this->service = $service;
        $this->model = $model;
    }

    /**
     * @param PermissaoRequest $request
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function store(PermissaoRequest $request)
    {
        return parent::save($request);
    }

    /**
     * @param PermissaoRequest $request
     * @param $id
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function update(PermissaoRequest $request, $id)
    {
        return parent::updateAs($request, $id);
    }

}
