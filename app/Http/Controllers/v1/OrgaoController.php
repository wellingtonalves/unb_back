<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\AbstractController;
use App\Models\Orgao;
use App\Services\OrgaoService;

class OrgaoController extends AbstractController
{
    /**
     * @var OrgaoService
     */
    protected $service;

    /**
     * @var Orgao
     */
    protected $model;

    public function __construct(OrgaoService $service, Orgao $model)
    {
        $this->service = $service;
        $this->model = $model;
    }
}
