<?php

namespace App\Http\Controllers\v1\Domain;

use App\Http\Controllers\AbstractController;
use App\Models\Domain\TipoOferta;
use App\Services\Domain\TipoOfertaService;

class TipoOfertaController extends AbstractController
{
    /**
     * @var TipoOfertaService
     */
    protected $service;

    /**
     * @var TipoOferta
     */
    protected $model;

    /**
     * TipoOfertaController constructor.
     *
     * @param TipoOfertaService $service
     * @param TipoOferta $model
     */
    public function __construct(TipoOfertaService $service, TipoOferta $model)
    {
        $this->service = $service;
        $this->model = $model;
    }

}
