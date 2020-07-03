<?php

namespace App\Services;

use App\Repositories\CursoRepository;
use App\Services\AbstractService;

class CursoService extends AbstractService
{

    /**
     * @var CursoRepository
     */
    protected $repository;

    /**
     * CursoService constructor.
     * @param CursoRepository $repository
     */
    public function __construct(CursoRepository $repository)
    {
        $this->repository = $repository;
    }
}
