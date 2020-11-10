<?php

namespace App\Services\Domain;

use App\Repositories\Domain\TipoOfertaRepository;
use App\Services\AbstractService;

class TipoOfertaService extends AbstractService
{

    /**
     * @var TipoOfertaRepository
     */
    protected $repository;

    /**
     * TipoOfertaService constructor.
     * @param TipoOfertaRepository $repository
     */
    public function __construct(TipoOfertaRepository $repository)
    {
        $this->repository = $repository;
    }

}
