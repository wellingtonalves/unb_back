<?php

namespace App\Services\Domain;


use App\Services\AbstractService;
use App\Repositories\Domain\UfRepository;

class UfService extends AbstractService
{

    /**
     * @var UfRepository
     */
    protected $repository;

    /**
     * AvaService constructor.
     * @param UfRepository $repository
     */
    public function __construct(UfRepository $repository)
    {
        $this->repository = $repository;
    }

}
