<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\AbstractController;
use App\Models\Perfil;
use App\Services\PerfilService;

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

}
