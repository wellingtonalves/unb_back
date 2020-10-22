<?php

namespace App\Services\Domain;

use App\Services\AbstractService;
use App\Repositories\Domain\MunicipioRepository;

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
