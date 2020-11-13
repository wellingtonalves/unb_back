<?php

namespace App\Services\Domain;

use App\Repositories\Domain\TipoExclusividadeOfertaRepository;
use App\Services\AbstractService;

class TipoExclusividadeOfertaService extends AbstractService
{

    /**
     * @var TipoExclusividadeOfertaRepository
     */
    protected $repository;

    /**
     * TipoOfertaService constructor.
     * @param TipoExclusividadeOfertaRepository $repository
     */
    public function __construct(TipoExclusividadeOfertaRepository $repository)
    {
        $this->repository = $repository;
    }

}
