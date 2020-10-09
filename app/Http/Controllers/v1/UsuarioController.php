<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\AbstractController;
use App\Http\Requests\UsuarioRequest;
use App\Models\Usuario;
use App\Services\UsuarioService;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;

class UsuarioController extends AbstractController
{
    /**
     * @var UsuarioService
     */
    protected $service;

    /**
     * @var Usuario
     */
    protected $model;

    /**
     * PessoaController constructor.
     * @param UsuarioService $service
     * @param Usuario $model
     */
    public function __construct(UsuarioService $service, Usuario $model)
    {
        $this->service = $service;
        $this->model = $model;
    }

    /**
     * @param UsuarioRequest $request
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function store(UsuarioRequest $request)
    {
        return parent::save($request);
    }

    /**
     * @param UsuarioRequest $request
     * @param $id
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function update(UsuarioRequest $request, $id)
    {
        return parent::updateAs($request, $id);
    }

}
