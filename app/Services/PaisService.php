<?php

namespace App\Services;


use App\Repositories\PaisRepository;

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
