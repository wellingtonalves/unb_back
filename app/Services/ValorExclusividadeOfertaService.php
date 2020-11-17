<?php

namespace App\Services;

use App\Repositories\ValorExclusividadeOfertaRepository;

class ValorExclusividadeOfertaService extends AbstractService
{

    /**
     * @var ValorExclusividadeOfertaRepository
     */
    protected $repository;

    /**
     * OfertaService constructor.
     * @param ValorExclusividadeOfertaRepository $repository
     */
    public function __construct(ValorExclusividadeOfertaRepository $repository)
    {
        $this->repository = $repository;
    }
}
