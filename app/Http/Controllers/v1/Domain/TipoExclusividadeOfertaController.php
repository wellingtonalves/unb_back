<?php

namespace App\Http\Controllers\v1\Domain;

use App\Http\Controllers\AbstractController;
use App\Models\Domain\TipoExclusividadeOferta;
use App\Services\Domain\TipoExclusividadeOfertaService;

class TipoExclusividadeOfertaController extends AbstractController
{
    /**
     * @var TipoExclusividadeOfertaService
     */
    protected $service;

    /**
     * @var TipoOferta
     */
    protected $model;

    /**
     * TipoOfertaController constructor.
     *
     * @param TipoExclusividadeOfertaService $service
     * @param TipoExclusividadeOferta $model
     */
    public function __construct(TipoExclusividadeOfertaService $service, TipoExclusividadeOferta $model)
    {
        $this->service = $service;
        $this->model = $model;
    }

}
