<?php

namespace App\Services\Domain;

use App\Services\AbstractService;
use App\Repositories\Domain\PaisRepository;

class PaisService extends AbstractService
{

    /**
     * @var PaisRepository
     */
    protected $repository;

    /**
     * AvaService constructor.
     * @param PaisRepository $repository
     */
    public function __construct(PaisRepository $repository)
    {
        $this->repository = $repository;
    }

}
