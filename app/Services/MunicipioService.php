<?php

namespace App\Services;


use App\Repositories\MunicipioRepository;

class MunicipioService extends AbstractService
{

    /**
     * @var MunicipioRepository
     */
    protected $repository;

    /**
     * AvaService constructor.
     * @param MunicipioRepository $repository
     */
    public function __construct(MunicipioRepository $repository)
    {
        $this->repository = $repository;
    }

}
