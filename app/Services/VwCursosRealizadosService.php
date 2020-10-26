<?php

namespace App\Services;

use App\Repositories\VwCursosRealizadosRepository;

class VwCursosRealizadosService extends AbstractService
{

    /**
     * @var VwCursosRealizadosRepository
     */
    protected $repository;

    /**
     * AvaService constructor.
     * @param VwCursosRealizadosRepository $repository
     */
    public function __construct(VwCursosRealizadosRepository $repository)
    {
        $this->repository = $repository;
    }

}
