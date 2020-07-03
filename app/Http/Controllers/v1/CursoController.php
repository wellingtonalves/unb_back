<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\AbstractController;
use App\Models\Curso;
use App\Services\CursoService;

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

    public function __construct(CursoService $service, Curso $model)
    {
        $this->service = $service;
        $this->model = $model;
    }
}
