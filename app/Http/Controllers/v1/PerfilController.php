<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\AbstractController;
use App\Http\Requests\PerfilRequest;
use App\Models\Perfil;
use App\Services\PerfilService;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;

class PerfilController extends AbstractController
{
    /**
     * @var PerfilService
     */
    protected $service;

    /**
     * @var Perfil
     */
    protected $model;

    public function __construct(PerfilService $service, Perfil $model)
    {
        $this->service = $service;
        $this->model = $model;
    }

    /**
     * @param PerfilRequest $request
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function store(PerfilRequest $request)
    {
        return parent::save($request);
    }

    /**
     * @param PerfilRequest $request
     * @param $id
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function update(PerfilRequest $request, $id)
    {
        return parent::updateAs($request, $id);
    }

}
