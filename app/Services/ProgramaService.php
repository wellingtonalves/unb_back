<?php

namespace App\Services;

use App\Repositories\ProgramaRepository;

class ProgramaService extends AbstractService
{

    /**
     * @var ProgramaRepository
     */
    protected $repository;

    /**
     * ProgramaService constructor.
     * @param ProgramaRepository $repository
     */
    public function __construct(ProgramaRepository $repository)
    {
        $this->repository = $repository;
    }
}
