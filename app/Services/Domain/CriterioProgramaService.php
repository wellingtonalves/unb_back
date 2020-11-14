<?php

namespace App\Services\Domain;

use App\Repositories\Domain\CriterioProgramaRepository;
use App\Services\AbstractService;

class CriterioProgramaService extends AbstractService
{

    /**
     * @var CriterioProgramaRepository
     */
    protected $repository;

    /**
     * AvaService constructor.
     * @param CriterioProgramaRepository $repository
     */
    public function __construct(CriterioProgramaRepository $repository)
    {
        $this->repository = $repository;
    }
}
