<?php

namespace App\Services;

use App\Repositories\ExclusividadeOfertaRepository;

class ExclusividadeOfertaService extends AbstractService
{

    /**
     * @var ExclusividadeOfertaRepository
     */
    protected $repository;

    /**
     * OfertaService constructor.
     * @param ExclusividadeOfertaRepository $repository
     */
    public function __construct(ExclusividadeOfertaRepository $repository)
    {
        $this->repository = $repository;
    }
}
