<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\AbstractController;
use App\Models\Pessoa;
use App\Services\PessoaService;

class PessoaController extends AbstractController
{
    /**
     * @var PessoaService
     */
    protected $service;

    /**
     * @var Pessoa
     */
    protected $model;

    /**
     * PessoaController constructor.
     * @param PessoaService $service
     * @param Pessoa $model
     */
    public function __construct(PessoaService $service, Pessoa $model)
    {
        $this->service = $service;
        $this->model = $model;
    }

}
