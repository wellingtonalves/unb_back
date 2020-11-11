<?php

namespace App\Services;

use App\Repositories\OfertaRepository;

class OfertaService extends AbstractService
{

    /**
     * @var OfertaRepository
     */
    protected $repository;

    /**
     * OfertaService constructor.
     * @param OfertaRepository $repository
     */
    public function __construct(OfertaRepository $repository)
    {
        $this->repository = $repository;
    }
}
