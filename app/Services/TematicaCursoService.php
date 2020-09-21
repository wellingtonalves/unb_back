<?php

namespace App\Services;

use App\Repositories\TematicaCursoRepository;

class TematicaCursoService extends AbstractService
{

    /**
     * @var TematicaCursoRepository
     */
    protected $repository;

    /**
     * TematicaCursoService constructor.
     * @param TematicaCursoRepository $repository
     */
    public function __construct(TematicaCursoRepository $repository)
    {
        $this->repository = $repository;
    }
}
