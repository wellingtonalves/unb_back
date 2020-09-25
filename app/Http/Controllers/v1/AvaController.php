<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\AbstractController;
use App\Models\Ava;
use App\Services\AvaService;

class AvaController extends AbstractController
{
    /**
     * @var AvaService
     */
    protected $service;

    /**
     * @var Ava
     */
    protected $model;

    public function __construct(AvaService $service, Ava $model)
    {
        $this->service = $service;
        $this->model = $model;
    }
}
